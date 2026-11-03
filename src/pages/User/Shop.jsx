
import { useState } from "react";
import {
  Typography,
  Row,
  Col,
  Card,
  Button,
  Input,
  Tag,
  Carousel,
  Space,
  Divider,
  Empty,
  message,
} from "antd";
import {
  SearchOutlined,
  ShoppingCartOutlined,
  HeartOutlined,
  StarFilled,
  InstagramOutlined,
  FacebookFilled,
  TikTokOutlined,
} from "@ant-design/icons";
import { Link } from "react-router";

import banner1 from "../../assets/banner1.png";
import banner2 from "../../assets/banner2.png";
import banner3 from "../../assets/banner3.png";

const { Title, Text } = Typography;
const CART_KEY = "prettierCart";

function readCart() {
  try {
    return JSON.parse(localStorage.getItem(CART_KEY) || "[]");
  } catch {
    return [];
  }
}

function Shop({ products = [] }) {
  const [search, setSearch] = useState("");

  function handleAddToCart(product) {
    const cart = readCart();
    const existing = cart.find(
      (item) => String(item.id) === String(product.id)
    );

    const updated = existing
      ? cart.map((item) =>
          String(item.id) === String(product.id)
            ? { ...item, quantity: Number(item.quantity || 1) + 1 }
            : item
        )
      : [...cart, { ...product, quantity: 1 }];

    localStorage.setItem(CART_KEY, JSON.stringify(updated));
    window.dispatchEvent(new Event("cartUpdated"));
    message.success(`${product.name} added to cart!`);
  }

  const filteredProducts = products.filter((product) =>
    (product.name || "").toLowerCase().includes(search.toLowerCase())
  );

  const bestSellers = filteredProducts.slice(0, 6);
  const newArrivals = filteredProducts.slice(6);

  function renderProduct(product) {
    return (
      <Col key={product.id} xs={24} sm={12} lg={8}>
        <Card
          hoverable
          className="shop-product-card"
          cover={
            <div className="product-image-wrapper">
              <img
                src={product.image}
                alt={product.name}
                className="product-image"
              />
            </div>
          }
          actions={[
            <HeartOutlined key="heart" />,
            <ShoppingCartOutlined
              key="cart"
              onClick={() => handleAddToCart(product)}
            />,
          ]}
        >
          <Space direction="vertical" size={8} style={{ width: "100%" }}>
            <Row justify="space-between" align="middle">
              <Col>
                <Tag color="pink">{product.category || "Beauty"}</Tag>
              </Col>
              <Col>
                <Text type="secondary">{product.sold || 0} sold</Text>
              </Col>
            </Row>

            <Title level={4} className="product-name">
              {product.name}
            </Title>

            <Text type="secondary">{product.description}</Text>

            <Space>
              <StarFilled style={{ color: "#e9cb09" }} />
              <Text>5.0</Text>
            </Space>

            <Text strong className="product-price">
              ${Number(product.price || 0).toFixed(2)}
            </Text>

            <Button
              type="primary"
              block
              icon={<ShoppingCartOutlined />}
              onClick={() => handleAddToCart(product)}
            >
              Add to Cart
            </Button>
          </Space>
        </Card>
      </Col>
    );
  }

  return (
    <>
      <style>{`
        .shop-page {
          padding: 30px 50px 60px;
          background: #fff;
          min-height: 100vh;
        }
        .shop-carousel {
          margin-bottom: 35px;
          overflow: hidden;
          border-radius: 14px;
        }
        .shop-carousel img {
          display: block;
          width: 100%;
          height: 520px;
          object-fit: cover;
          border-radius: 14px;
        }
        .shop-section {
          margin-bottom: 50px;
        }
        .shop-product-card {
          height: 100%;
          overflow: hidden;
          border-radius: 14px;
          transition: transform .25s, box-shadow .25s;
        }
        .shop-product-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 24px #d9688b20;
        }
        .product-image-wrapper {
          display: flex;
          align-items: center;
          justify-content: center;
          height: 220px;
          padding: 12px;
          background: #fff;
          overflow: hidden;
        }
        .product-image {
          width: 100%;
          height: 100%;
          object-fit: contain;
          transition: transform .25s;
        }
        .shop-product-card:hover .product-image {
          transform: scale(1.04);
        }
        .product-name {
          margin: 0 !important;
        }
        .product-price {
          color: #6360f8;
          font-size: 20px;
        }
        .shop-page .ant-btn-primary {
          background: #ff9bfa;
          border-color: #ff9bfa;
        }
        .shop-page .ant-btn-primary:hover {
          background: #e978d9 !important;
          border-color: #e978d9 !important;
        }
        .shop-footer {
          margin-top: 60px;
          padding: 40px 5% 20px;
          background: #fff7fa;
          border-top: 1px solid #f3dfe6;
        }
        .footer-title {
          color: #ff6f91 !important;
        }
        @media (max-width: 768px) {
          .shop-page { padding: 20px 14px; }
          .shop-carousel img { height: 220px; }
          .product-image-wrapper { height: 200px; }
        }
      `}</style>

      <main className="shop-page">
        <Carousel autoplay arrows className="shop-carousel">
          <div><img src={banner1} alt="Korean Beauty" /></div>
          <div><img src={banner2} alt="Beauty Products" /></div>
          <div><img src={banner3} alt="Korean Skincare" /></div>
        </Carousel>

        
        {filteredProducts.length === 0 ? (
          <Empty description="No products found" />
        ) : (
          <>
            <section className="shop-section">
              <Row justify="space-between" align="middle">
                <Col><Title level={3}>Best Sellers</Title></Col>
                <Col><Tag color="pink">Popular Products</Tag></Col>
              </Row>
              <Divider />
              <Row gutter={[24, 24]}>
                {bestSellers.map(renderProduct)}
              </Row>
            </section>

            {newArrivals.length > 0 && (
              <section className="shop-section">
                <Row justify="space-between" align="middle">
                  <Col><Title level={3}>New Arrivals</Title></Col>
                  <Col><Tag color="green">New</Tag></Col>
                </Row>
                <Divider />
                <Row gutter={[24, 24]}>
                  {newArrivals.map(renderProduct)}
                </Row>
              </section>
            )}
          </>
        )}

        
<footer className="shop-footer">
  <Row gutter={[40, 40]}>
    {/* BRAND */}
    <Col xs={24} sm={12} lg={8}>
      <Title level={2} className="footer-title">
        Prettier
      </Title>

      <Text type="secondary">
        Beauty essentials made to make you feel
        confident, fresh, and prettier every day. ♡
      </Text>

      <br />

      <Space style={{ marginTop: 20 }}>
        <a
          href="https://www.instagram.com/adelajergova/"
          target="_blank"
          rel="noreferrer"
          aria-label="Instagram"
        >
          <InstagramOutlined style={{ fontSize: 22 }} />
        </a>

        <a
          href="https://www.facebook.com/bareofficialpage/"
          target="_blank"
          rel="noreferrer"
          aria-label="Facebook"
        >
          <FacebookFilled style={{ fontSize: 22 }} />
        </a>
      </Space>
    </Col>

    {/* SHOP */}
    <Col xs={12} sm={6} lg={4}>
      <div className="footer-heading">Shop</div>

      <Space direction="vertical">
        <Text className="footer-link">All Products</Text>
        <Text className="footer-link">Best Sellers</Text>
        <Text className="footer-link">New Arrivals</Text>
      </Space>
    </Col>

    {/* HELP */}
    <Col xs={12} sm={6} lg={4}>
      <div className="footer-heading">Help</div>

      <Space direction="vertical">
        <Text className="footer-link">Privacy Policy</Text>
        <Text className="footer-link">
          Shipping &amp; Delivery
        </Text>
        <Text className="footer-link">Returns</Text>
      </Space>
    </Col>

    {/* CONTACT */}
    <Col xs={24} sm={12} lg={4}>
      <div className="footer-heading">Contact Us</div>

      <Space direction="vertical">
        <a
          href="https://www.instagram.com/adelajergova/"
          target="_blank"
          rel="noreferrer"
        >
          Instagram
        </a>

        <a
          href="https://www.tiktok.com/@katseyeworld"
          target="_blank"
          rel="noreferrer"
        >
          TikTok
        </a>

        <a
          href="https://www.facebook.com/bareofficialpage/"
          target="_blank"
          rel="noreferrer"
        >
          Facebook
        </a>
      </Space>
    </Col>
  </Row>

  <div className="footer-bottom">
    <Row justify="space-between" align="middle">
      <Col>
        <Text type="secondary">
          © 2026 Prettier. Make your skin brigter.
        </Text>
      </Col>

      <Col>
        <Text type="secondary">
          Made with ♡ for beauty lovers
        </Text>
      </Col>
    </Row>
  </div>
</footer>

      </main>
    </>
  );
}

export default Shop;

