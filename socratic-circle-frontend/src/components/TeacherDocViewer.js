import React from "react";

const TeacherDocViewer = (props) => {
  // TODO: Implement API call to backend to get the teacher's documents
  const [currDocIndex, setCurrDocIndex] = React.useState(0);
  // create function to handle the next and previous buttons
  const handleDocButton = (direction) => {
    if (direction === "right") { // right is next
      if (currDocIndex === 2) {
        setCurrDocIndex(0);
      } else {
        setCurrDocIndex(currDocIndex + 1);
      }
    } else { // left is previous
      if (currDocIndex === 0) {
        setCurrDocIndex(2);
      } else {
        setCurrDocIndex(currDocIndex - 1);
      }
    }
  };
  return (
    <div>
      <div>
        <button onClick={() => handleDocButton("left")}>
          Previous
        </button>
        <iframe
          className="Teacher-Iframe"
          title="group A"
          src="https://docs.google.com/document/d/1OulQL0EtHAiTl7DEmLF77ApexEVsIQlwWdWr-4UQfhw/edit?usp=sharing"
        ></iframe>
        <button onClick={() => handleDocButton("right")}>Next</button>
        {/* display currDocIndex */}
        <p>{currDocIndex}</p>
      </div>
    </div>
  );
};

export default TeacherDocViewer;
