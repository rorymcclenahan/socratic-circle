import React from "react";
import "../styles/iframe.css";
import TeacherDocViewer from "../components/TeacherDocViewer";

const Teacher = () => {
  return (
    <div>
      <h1>Teacher View</h1> {/* temp docs */}
      <div className="Teacher-Doc-Container">
        <iframe
          className="Teacher-Iframe"
          title="group A"
          src="https://docs.google.com/document/d/1OulQL0EtHAiTl7DEmLF77ApexEVsIQlwWdWr-4UQfhw/edit?usp=sharing"
        ></iframe>
        <iframe
          className="Teacher-Iframe"
          title="group B"
          src="https://docs.google.com/document/d/1RqCdbj0udAM8-uOvh9y9Os_PIohalCiHnd1mBq8hPY0/edit?usp=sharing"
        ></iframe>
        <iframe
          className="Teacher-Iframe"
          title="group B"
          src="https://docs.google.com/document/d/1Lvi6oYtJeeFxNA-JaYRVp1O5rpnWbTMqHquvfGBV5Uc/edit?usp=sharing"
        ></iframe>
      </div>
      <div className="Teacher-Doc-Container">
        <TeacherDocViewer />
      </div>
    </div>
  );
};

export default Teacher;
