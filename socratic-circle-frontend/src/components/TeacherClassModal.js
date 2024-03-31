import React from "react";
import { useState } from "react";
import TeacherClassEditor from "./TeacherClassEditor";

const TeacherClassModal = () => {
  const [showClassEditor, setShowClassEditor] = useState(false);

  const toggleClassEditor = () => {
    setShowClassEditor(!showClassEditor);
  };
  

  return (
    <div>
      <div>
        <div>Teacher Class Editor</div>
        <button onClick={toggleClassEditor}>Toggle Class Editor</button>
        {showClassEditor && <TeacherClassEditor />}
      </div>
      <div>
        <div>All Classes</div>

      </div>
    </div>
  );
};

export default TeacherClassModal;
