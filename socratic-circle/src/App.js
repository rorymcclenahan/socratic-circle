import "./App.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";

function App() {
  return (
    <BrowserRouter>
      <NavigationBar />
      <Routes>
        <Route exact path="/login" element={<Login />}></Route>
        <Route exact path="/newSignup" element={<Signup />}></Route>
        <Route exact path="/teacher" element={<Teacher />}></Route>
        <Route exact path="/student" element={<Student />}></Route>
        <Route exact path="/" element={<Homescreen />}></Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
