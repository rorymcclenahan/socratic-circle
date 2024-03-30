import "./App.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Homepage from "./views/Homepage";
import Login from "./views/Login";

function App() {
  return (
    // <div>hello</div>
    <BrowserRouter>
      {/* <NavigationBar /> */}
      <Routes>
        <Route path="/login" element={<Login />}></Route>
        {/* <Route exact path="/newSignup" element={<Signup />}></Route>
        <Route exact path="/teacher" element={<Teacher />}></Route>
        <Route exact path="/student" element={<Student />}></Route> */}
        <Route path="/" element={<Homepage />}></Route>
        <Route path="*" element={<h1>Route does not exist</h1>} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
