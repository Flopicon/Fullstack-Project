import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

export default function Register() {
  const { signUp } = useAuth();
  const navigate = useNavigate();
  const [form, setForm] = useState({name:'',email:'',password:'',password_confirmation:''});
  const [error, setError] = useState('');
  const [busy, setBusy] = useState(false);
  async function submit(e) {
    e.preventDefault(); setError(''); setBusy(true);
    try { await signUp(form); navigate('/dashboard', { replace:true }); }
    catch (err) {
      const errors = err.response?.data?.errors;
      setError(errors ? Object.values(errors).flat().join(' ') :
        err.response?.data?.message || 'Registration failed');
    } finally { setBusy(false); }
  }
  return <form onSubmit={submit}>
    <h1>Register</h1>
    {error && <p role="alert">{error}</p>}
    {Object.keys(form).map(key => <label key={key}>
      {key.replace('_',' ')}
      <input required type={key.includes('password') ? 'password' : key === 'email' ? 'email' : 'text'}
        value={form[key]} onChange={e => setForm({...form,[key]:e.target.value})}/>
    </label>)}
    <button disabled={busy}>{busy ? 'Creating...' : 'Register'}</button>
  </form>;
}
