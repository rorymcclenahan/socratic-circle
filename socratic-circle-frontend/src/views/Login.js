import React from "react";
import { useState } from "react";
import "../styles/Login.css";

const Login = () => {
  const [isLogin, setIsLogin] = useState(true);

  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [email, setEmail] = useState("");

  const handleInputChange = (event) => {
    const { name, value } = event.target;

    switch (name) {
      case "username":
        setUsername(value);
        break;
      case "password":
        setPassword(value);
        break;
      case "confirmPassword":
        setConfirmPassword(value);
        break;
      case "email":
        setEmail(value);
        break;
      default:
        break;
    }
  };

  return (
    <div className="login-menu">
      <div className="login-box">
        {isLogin ? <h2>Login</h2> : <h2>Signup</h2>}
        <form>
          <label className="entry-box">
            Username:
            <input
              type="email"
              name="username"
              value={email}
              onChange={handleInputChange}
            />
          </label>
          <br />
          <label>
            Password:
            <input
              type="password"
              name="password"
              value={password}
              onChange={handleInputChange}
            />
          </label>
          <br />
          {!isLogin && (
            <label>
              Confirm Password:
              <input
                type="password"
                name="confirmPassword"
                value={confirmPassword}
                onChange={handleInputChange}
              />
            </label>
          )}
          {!isLogin && (
            <label>
              Email:
              <input
                type="email"
                name="email"
                value={email}
                onChange={handleInputChange}
              />
            </label>
          )}
          <br />
          <button type="submit">{isLogin ? "Login" : "Signup"}</button>
        </form>
      </div>
    </div>
  );
};

export default Login;
