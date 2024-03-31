import React from "react";
import "../styles/iframe.css";
import TeacherDocViewer from "../components/TeacherDocViewer";
import TeacherGroupModal from "../components/TeacherGroupModal";
import TeacherClassModal from "../components/TeacherClassModal";
import { useState } from "react";
import "../styles/Teacher.css";
import { Button } from "react-bootstrap";

const Teacher = () => {
  const [showTeacherDocViewer, setShowTeacherDocViewer] = React.useState(false);
  const [showTeacherGroupModal, setShowTeacherGroupModal] =
    React.useState(false);
  const [showTeacherClassModal, setShowTeacherClassModal] =
    React.useState(true);

  const toggleTeacherDocViewer = () => {
    setShowTeacherDocViewer(!showTeacherDocViewer);
    setShowTeacherGroupModal(false);
    setShowTeacherClassModal(false);
  };

  const toggleTeacherGroupModal = () => {
    setShowTeacherGroupModal(!showTeacherGroupModal);
    setShowTeacherDocViewer(false);
    setShowTeacherClassModal(false);
  };

  const toggleTeacherClassModal = () => {
    setShowTeacherClassModal(!showTeacherClassModal);
    setShowTeacherDocViewer(false);
    setShowTeacherGroupModal(false);
  };

  return (
    <div className="teacher-view">
      <div className="toggle-view-button-list">
        <Button onClick={toggleTeacherDocViewer}>
          Toggle Teacher Doc Viewer
        </Button>
        <Button onClick={toggleTeacherGroupModal}>
          Toggle Teacher Manage Groups
        </Button>
        <Button onClick={toggleTeacherClassModal}>
          Toggle Teacher Manage Class
        </Button>
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
