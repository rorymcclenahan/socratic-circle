import React from "react";
import { useState } from "react";
import axios from "axios";
import "../styles/Login.css";

const Login = () => {
  const [isLogin, setIsLogin] = useState(true);
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [email, setEmail] = useState("");

  const handleToggleLogin = () => {
    setIsLogin(!isLogin);
};



{/* <button type="submit" onClick={handleSubbbb}
disabled={!(password === confirmPassword)}>{"sign up"}</button>  */}

  const handleSubbbb = (event) => {
    // const {name, value} = event.target;  
//   axios
  var woof = "http://localhost/socratic-circle/index.php/skewl/signup?username="+username+"&password="+password+"&email="+email;
  console.log(woof);
  alert(woof);

      axios.get(woof)
      .catch((error) => alert (error));
  //Handle saving the edited item
//   console.log("Edited Item:", editedItem); // Print the edited item to the console
//   setShowEditModal(false);
//   window.location.reload(false);

};

const handleSubbbb2 = (event) => {
    // const {name, value} = event.target;  
//   axios
  var woof = "http://localhost/socratic-circle/index.php/skewl/login?username="+username+"&password="+password;
  console.log(woof);
  alert(woof);

      axios.get(woof)
      .then(
        localStorage.setItem('logged in', username),
        // alert("so shrigma?"),
        alert("logged in as: "+localStorage.getItem('logged in'))
      )
      .catch((error) => alert (error));
  //Handle saving the edited item
//   console.log("Edited Item:", editedItem); // Print the edited item to the console
//   setShowEditModal(false);
//   window.location.reload(false);

};

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
        <div>
          <label className="entry-box">
            Username:
            <input
              type="username"
              name="username"
              value={username}
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
          <br />
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
          {/* <button type="submit" onChange={handleToggleLogin}>{isLogin ? "Signup" : "Signup"}</button> */}

          <button onClick={handleToggleLogin} >  {isLogin ? "Switch to Signup" : "Switch to Login"}
      </button>

          <button type="submit" onChange={handleSubbbb} hidden={isLogin} disabled={!(password === confirmPassword)}> {"Signup"}</button>
          <button type="submit" onClick={handleSubbbb2} hidden={!isLogin}>{"Login"}</button>
        </div>
      </div>
    </div>
  );
};

export default Login;
