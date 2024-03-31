import './App.css';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import NavigationBar from './components/NavigationBar';
import Login from './views/Login';
import Homescreen from './views/Homescreen';
import Teacher from './views/Teacher';
import Student from './views/Student';
import React from 'react';
import './App.css';

function App() {
  return (
    <div className="App">
    <BrowserRouter>
      <NavigationBar />
      <Routes>
      <Route exact path="/teacher" element={<Teacher />}></Route>
        <Route exact path="/login" element={<Login />}></Route>
        <Route exact path="/" element={<Homescreen />}></Route>
        <Route exact path="/student" element={<Student />}></Route>
      </Routes>
    </BrowserRouter>
    </div>
  );
}

export default App;

{/* <Route exact path="/newSignup" element={<Signup />}></Route>
<Route exact path="/teacher" element={<Teacher />}></Route>
<Route exact path="/student" element={<Student />}></Route> */}