import React from 'react'
import { useState } from 'react'

const Login = () => {
const [isLogin, setIsLogin] = useState(true);

const handleToggle = () => {
    setIsLogin(!isLogin);
};

return (
    <div>
        {isLogin ? <h2>Login</h2> : <h2>Signup</h2>}
        <form>
            <label>
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
);
}

export default Login