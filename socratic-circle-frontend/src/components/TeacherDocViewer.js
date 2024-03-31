import React from "react";

const TeacherDocViewer = (props) => {
  // TODO: Implement API call to backend to get the teacher's documents
const docUrls = [
    {
        groupName: "Group A",
        docIndex: 0,
        url: "https://docs.google.com/document/d/1OulQL0EtHAiTl7DEmLF77ApexEVsIQlwWdWr-4UQfhw/edit?usp=sharing",
    },
    {
        groupName: "Group B",
        docIndex: 1,
        url: "https://docs.google.com/document/d/1RqCdbj0udAM8-uOvh9y9Os_PIohalCiHnd1mBq8hPY0/edit?usp=sharing",
    },
    {
        groupName: "Group C",
        docIndex: 2,
        url: "https://docs.google.com/document/d/1Lvi6oYtJeeFxNA-JaYRVp1O5rpnWbTMqHquvfGBV5Uc/edit?usp=sharing",
    },
];
  const [currDocIndex, setCurrDocIndex] = React.useState(0);
  // create function to handle the next and previous buttons
  const handleDocButton = (direction) => {
    if (direction === "right") {
      setCurrDocIndex((prevIndex) => (prevIndex + 1) % docUrls.length);
    } else {
      setCurrDocIndex(
        (prevIndex) => (prevIndex - 1 + docUrls.length) % docUrls.length
      );
    }
  };
return (
    <div>
        <div>
            <button onClick={() => handleDocButton("left")}>Previous</button>

            {docUrls.map((doc, index) => (
                <React.Fragment key={index}>
                    {currDocIndex === index && (
                        <iframe
                            className="teacher-iframe"
                            title={`group ${doc.docIndex}`}
                            src={doc.url}
                        ></iframe>
                    )}
                </React.Fragment>
            ))}

            <button onClick={() => handleDocButton("right")}>Next</button>
            {/* display currDocIndex */}
            <p>{currDocIndex}</p>
        </div>
        <div className="teacher-doc-buttons">
            {docUrls.map((doc, index) => (
                <button key={index} onClick={() => setCurrDocIndex(index)}>
                    {`${doc.groupName}`}
                </button>
            ))}
        </div>
    </div>
);
};

export default TeacherDocViewer;

