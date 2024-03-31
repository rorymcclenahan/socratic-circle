import React from "react";
import "../styles/iframe.css";
import TeacherDocViewer from "../components/TeacherDocViewer";

const Teacher = () => {
  const [showTeacherDocViewer, setShowTeacherDocViewer] = React.useState(true);

  const toggleTeacherDocViewer = () => {
    setShowTeacherDocViewer(!showTeacherDocViewer);
  };
  return (
    <div>
      <button onClick={toggleTeacherDocViewer}>
        Toggle Teacher Doc Viewer
      </button>
      {showTeacherDocViewer && (
        <div className="Teacher-Doc-Container">
          <TeacherDocViewer />
        </div>
      )}
    </div>
  );
};

export default Teacher;
