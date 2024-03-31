import React from "react";
import "../styles/iframe.css";
import TeacherDocViewer from "../components/TeacherDocViewer";

const Teacher = () => {
  return (
    <div>
      <h1>Teacher View</h1> {/* temp docs */}
      <div className="Teacher-Doc-Container">
        <TeacherDocViewer />
      </div>
    </div>
  );
};

export default Teacher;
