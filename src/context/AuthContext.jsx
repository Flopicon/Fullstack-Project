import { createContext, useContext, useEffect, useState } from 'react';
import * as auth from '../services/auth';

const AuthContext = createContext(null);
export function AuthProvider({ children }) {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    let active = true;
    auth.getUser().then(u => {
      if (active) setUser(u);
    }).catch(() => {
      if (active) setUser(null);
    }).finally(() => {
      if (active) setLoading(false);
    });
    return () => { active = false; };
  }, []);

 
async function signIn(values) {
  const current = await auth.login(values);
  setUser(current);
  return current;
}

async function signIn(values) {
  const current = await auth.login(values);
  setUser(current);
  return current;
}

  async function signOut() {
    await auth.logout();
    setUser(null);
  }
  return <AuthContext.Provider value={{user, loading, signIn, signUp, signOut}}>
    {children}
  </AuthContext.Provider>;
}
export function useAuth() {
  const context = useContext(AuthContext);
  if (!context) throw new Error('useAuth must be inside AuthProvider');
  return context;
}
