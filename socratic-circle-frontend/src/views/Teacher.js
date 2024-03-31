import React from "react";
import "../styles/iframe.css";
import TeacherDocViewer from "../components/TeacherDocViewer";
import TeacherManageGroups from "../components/TeacherManageGroups";

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
      <div>
        <TeacherManageGroups />
      </div>
    </div>
  );
};

export default Teacher;
