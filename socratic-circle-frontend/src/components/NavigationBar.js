import React from "react";
import { Navbar, Nav, NavDropdown } from "react-bootstrap";
import "../styles/NavigationBar.css";

function NavigationBar() {
  return (
    <div className="nav">
      <Navbar className="navbar">
        <Navbar.Brand className="navbar-title" href="/">
          Socratic Circle
        </Navbar.Brand>
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="navbar-buttons">
            <Nav.Link className='navbar-links' href="/login">Login</Nav.Link>
            <Nav.Link className='navbar-links' href="/teacher">Teacher</Nav.Link>
            <Nav.Link className='navbar-links' href="/student">Student</Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    </div>
  );
}

export default NavigationBar;
