import React from 'react'
import { useState } from 'react'
import '../styles/Login.css'

const Login = () => {
const [isLogin, setIsLogin] = useState(true);

const handleToggle = () => {
    setIsLogin(!isLogin);
};

return (
    <div className='login-menu'>
        <div className='login-box'>
        {isLogin ? <h2>Login</h2> : <h2>Signup</h2>}
        <form>
            <label className='entry-box'>
                Email:
                <input type="email" />
            </label>
            <br />
            <label>
                Password:
                <input type="password" />
            </label>
            <br />
            {!isLogin && (
                <label>
                    Confirm Password:
                    <input type="password" />
                </label>
            )}
            <br />
            <button type="submit">{isLogin ? 'Login' : 'Signup'}</button>
        </form>
        <button onClick={handleToggle}>
            {isLogin ? 'Switch to Signup' : 'Switch to Login'}
        </button>
        </div>
    </div>
);
}

export default Login