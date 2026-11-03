
import { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

export default function Login() {
  const { signIn } = useAuth();
  const navigate = useNavigate();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [busy, setBusy] = useState(false);

  async function submit(e) {
    e.preventDefault();
    setError('');
    setBusy(true);

    try {
      const data = await signIn({ email, password });
      const user = data.user;

      if (user.role === 'admin') {
        navigate('/dashboard', { replace: true });
      } else {
        navigate('/order', { replace: true });
      }
    } catch (err) {
      setError(
        err.response?.data?.errors?.email?.[0] ||
        err.response?.data?.message ||
        err.message ||
        'Unable to log in'
      );
    } finally {
      setBusy(false);
    }
  }

  return (
    <form onSubmit={submit}>
      <h1>Login</h1>

      {error && <p role="alert">{error}</p>}

      <input
        aria-label="Email"
        type="email"
        placeholder="Email"
        required
        value={email}
        onChange={e => setEmail(e.target.value)}
      />

      <input
        aria-label="Password"
        type="password"
        placeholder="Password"
        required
        value={password}
        onChange={e => setPassword(e.target.value)}
      />

      <button type="submit" disabled={busy}>
        {busy ? 'Logging in...' : 'Login'}
      </button>

      <Link to="/register">Create an account</Link>
    </form>
  );
}



