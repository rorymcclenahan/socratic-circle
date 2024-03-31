import React from "react";
import "../styles/iframe.css";
import TeacherDocViewer from "../components/TeacherDocViewer";
import TeacherGroupModal from "../components/TeacherGroupModal";
import TeacherClassModal from "../components/TeacherClassModal";

const Teacher = () => {
  const [showTeacherDocViewer, setShowTeacherDocViewer] = React.useState(false);
  const [showTeacherGroupModal, setShowTeacherGroupModal] =
    React.useState(false);
  const [showTeacherClassModal, setShowTeacherClassModal] =
    React.useState(true);

  const toggleTeacherDocViewer = () => {
    setShowTeacherDocViewer(!showTeacherDocViewer);
  };

  const toggleTeacherGroupModal = () => {
    setShowTeacherGroupModal(!showTeacherGroupModal);
  };

  const toggleTeacherClassModal = () => {
    setShowTeacherClassModal(!showTeacherClassModal);
  };

  return (
    <div>
      <div className="toggle-view-buttons">
        <button onClick={toggleTeacherDocViewer}>
          Toggle Teacher Doc Viewer
        </button>
        <button onClick={toggleTeacherGroupModal}>
          Toggle Teacher Manage Groups
        </button>
        <button onClick={toggleTeacherClassModal}>
          Toggle Teacher Manage Class
        </button>
      </div>

      {showTeacherDocViewer && (
        <div className="Teacher-Doc-Container">
          <TeacherDocViewer />
        </div>
      )}

      {showTeacherGroupModal && (
        <div className="Teacher-Groups-Container">
          <TeacherGroupModal />
        </div>
      )}

      {showTeacherClassModal && (
        <div className="Teacher-Create-Class-Container">
          <TeacherClassModal />
        </div>
      )}
    </div>
  );
};

export default Teacher;
