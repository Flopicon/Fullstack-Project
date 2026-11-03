
import { useEffect, useState } from "react";
import { Link } from "react-router";
import {
  ShoppingBag,
  Trash2,
  Plus,
  Minus,
  ArrowLeft,
} from "lucide-react";

const CART_KEY = "prettierCart";

function readCart() {
  try {
    return JSON.parse(localStorage.getItem(CART_KEY) || "[]");
  } catch {
    return [];
  }
}

export default function Cart() {
  const [cartItems, setCartItems] = useState(readCart);

  useEffect(() => {
    function syncCart() {
      setCartItems(readCart());
    }

    window.addEventListener("cartUpdated", syncCart);
    window.addEventListener("storage", syncCart);

    return () => {
      window.removeEventListener("cartUpdated", syncCart);
      window.removeEventListener("storage", syncCart);
    };
  }, []);

  function saveCart(updatedItems) {
    localStorage.setItem(CART_KEY, JSON.stringify(updatedItems));
    setCartItems(updatedItems);
    window.dispatchEvent(new Event("cartUpdated"));
  }

  function updateQuantity(id, amount) {
    const updatedItems = cartItems.map((item) =>
      String(item.id) === String(id)
        ? {
            ...item,
            quantity: Math.max(1, Number(item.quantity || 1) + amount),
          }
        : item
    );

    saveCart(updatedItems);
  }

  function removeItem(id) {
    saveCart(
      cartItems.filter((item) => String(item.id) !== String(id))
    );
  }

  const subtotal = cartItems.reduce(
    (sum, item) =>
      sum + Number(item.price || 0) * Number(item.quantity || 1),
    0
  );

  const totalItems = cartItems.reduce(
    (sum, item) => sum + Number(item.quantity || 1),
    0
  );

  return (
    <>
      <style>{`
        .cart-page {
          max-width: 1200px;
          margin: auto;
          padding: 40px 24px 60px;
          color: #382832;
          min-height: 70vh;
        }

        .cart-heading {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 30px;
        }

        .cart-label {
          color: #68ccd9;
          font-size: 12px;
          letter-spacing: 2px;
        }

        .cart-heading h1 {
          font-size: 32px;
          margin: 8px 0;
        }

        .cart-muted {
          color: #8e7b84;
        }

        .cart-layout {
          display: grid;
          grid-template-columns: 1.7fr 1fr;
          gap: 25px;
          align-items: start;
        }

        .cart-items,
        .order-summary,
        .empty-cart {
          background: #fff;
          border: 1px solid #f3e3e9;
          border-radius: 18px;
          padding: 24px;
          box-shadow: 0 5px 20px #59324608;
        }

        .cart-item {
          display: flex;
          align-items: center;
          gap: 16px;
          padding: 18px 0;
          border-bottom: 1px solid #f4e9ed;
        }

        .cart-item:first-child { padding-top: 0; }
        .cart-item:last-child { border-bottom: none; }

        .cart-item img {
          width: 100px;
          height: 110px;
          object-fit: contain;
          background: #fff5f7;
          border-radius: 12px;
        }

        .cart-item-info {
          flex: 1;
          min-width: 0;
        }

        .cart-item-info h3 {
          margin: 0 0 8px;
          font-size: 16px;
          overflow-wrap: anywhere;
        }

        .cart-price {
          color: #d9688b;
          font-size: 17px;
          font-weight: 700;
          margin: 0 0 12px;
        }

        .quantity-control {
          display: flex;
          align-items: center;
          gap: 14px;
        }

        .quantity-control button {
          display: grid;
          place-items: center;
          width: 32px;
          height: 32px;
          border: 1px solid #f1d9e2;
          border-radius: 8px;
          background: #fff7f9;
          color: #d9688b;
          cursor: pointer;
        }

        .remove-item {
          border: none;
          background: transparent;
          color: #b59ba5;
          cursor: pointer;
          padding: 8px;
        }

        .remove-item:hover { color: #d14e75; }

        .order-summary h2 {
          font-size: 21px;
          margin: 0 0 24px;
        }

        .summary-row,
        .summary-total {
          display: flex;
          justify-content: space-between;
          gap: 12px;
          margin: 18px 0;
        }

        .summary-total {
          border-top: 1px solid #f1e3e9;
          padding-top: 20px;
          font-size: 20px;
          font-weight: 700;
        }

        .summary-total span:last-child {
          color: #d9688b;
        }

        .checkout-button,
        .shop-button {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 100%;
          box-sizing: border-box;
          padding: 14px;
          background: #e97896;
          color: #fff;
          border: none;
          border-radius: 11px;
          font-weight: 600;
          text-decoration: none;
          cursor: pointer;
          transition: background .2s;
        }

        .checkout-button:hover,
        .shop-button:hover {
          background: #d95d80;
          color: #fff;
        }

        .back-link {
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 8px;
          margin-top: 22px;
          color: #d9688b;
          text-decoration: none;
        }

        .empty-cart {
          text-align: center;
          padding: 60px 24px;
        }

        .empty-cart > svg,
        .cart-bag-icon {
          color: #d9688b;
        }

        .empty-cart h2 {
          margin: 18px 0 8px;
        }

        .empty-cart .shop-button {
          max-width: 230px;
          margin: 24px auto 0;
        }

        @media (max-width: 750px) {
          .cart-page { padding: 24px 14px; }
          .cart-layout { grid-template-columns: 1fr; }
          .cart-heading h1 { font-size: 25px; }
          .cart-items, .order-summary { padding: 16px; }
          .cart-item { gap: 10px; }
          .cart-item img { width: 75px; height: 90px; }
        }
      `}</style>

      <main className="cart-page">
        <header className="cart-heading">
          <div>
            <p className="cart-label">YOUR BEAUTY PICKS</p>
            <h1>My Shopping Bag</h1>
            <p className="cart-muted">
              {totalItems} {totalItems === 1 ? "item" : "items"} in your bag
            </p>
          </div>
          <ShoppingBag className="cart-bag-icon" size={34} />
        </header>

        {cartItems.length === 0 ? (
          <section className="empty-cart">
            <ShoppingBag size={54} />
            <h2>Your bag is waiting for you</h2>
            <p className="cart-muted">
              Discover your favorite Korean beauty products.
            </p>
            <Link to="/shop" className="shop-button">
              Continue Shopping
            </Link>
          </section>
        ) : (
          <div className="cart-layout">
            <section className="cart-items">
              {cartItems.map((item) => (
                <article className="cart-item" key={item.id}>
                  <img src={item.image} alt={item.name} />

                  <div className="cart-item-info">
                    <h3>{item.name}</h3>
                    <p className="cart-price">
                      ${Number(item.price || 0).toFixed(2)}
                    </p>

                    <div className="quantity-control">
                      <button
                        onClick={() => updateQuantity(item.id, -1)}
                        aria-label="Decrease quantity"
                      >
                        <Minus size={14} />
                      </button>

                      <span>{item.quantity || 1}</span>

                      <button
                        onClick={() => updateQuantity(item.id, 1)}
                        aria-label="Increase quantity"
                      >
                        <Plus size={14} />
                      </button>
                    </div>
                  </div>

                  <button
                    className="remove-item"
                    onClick={() => removeItem(item.id)}
                    aria-label={`Remove ${item.name}`}
                    title="Remove item"
                  >
                    <Trash2 size={18} />
                  </button>
                </article>
              ))}
            </section>

            <aside className="order-summary">
              <h2>Order Summary</h2>

              <div className="summary-row">
                <span className="cart-muted">Items ({totalItems})</span>
                <span>${subtotal.toFixed(2)}</span>
              </div>

              <div className="summary-row">
                <span className="cart-muted">Shipping</span>
                <span>Calculated at checkout</span>
              </div>

              <div className="summary-total">
                <span>Subtotal</span>
                <span>${subtotal.toFixed(2)}</span>
              </div>

              <button
                className="checkout-button"
                onClick={() =>
                  alert("Checkout will be connected to your backend next.")
                }
              >
                Proceed to Checkout
              </button>

              <Link to="/shop" className="back-link">
                <ArrowLeft size={16} />
                Continue Shopping
              </Link>
            </aside>
          </div>
        )}
      </main>
    </>
  );
}


