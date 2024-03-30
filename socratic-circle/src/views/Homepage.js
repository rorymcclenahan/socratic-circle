import React from "react";

function HomePage() {
  return (
    <div>
      <Link to="/login">
        <p>go to users page</p>
      </Link>
      <h1>HomePage</h1>
    </div>
  );
}

export default HomePage;
