import React from "react";
import "../styles/Student.css";

const Student = () => {
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
  const [currGroup, setCurrGroup] = React.useState(0);
  const [currDocIndex, setCurrDocIndex] = React.useState(0);
  const [isPresenting, setIsPresenting] = React.useState(false);
  const [view, setView] = React.useState("all"); // ["all", "single"]
  const handleDocButton = (direction) => {
    if (direction === "right") {
      setCurrDocIndex((prevIndex) => (prevIndex + 1) % otherGroups.length);
    } else {
      setCurrDocIndex(
        (prevIndex) => (prevIndex - 1 + otherGroups.length) % otherGroups.length
      );
    }
  };
  const toggleView = () => {
    setView(view === "all" ? "single" : "all");
  };

  const studentGroup = docUrls[currGroup].groupName;
  const otherGroups = docUrls.filter((doc) => doc.groupName !== studentGroup);

  return (
    <div>
      <h1>Student</h1>
      <button onClick={() => setIsPresenting(!isPresenting)}>
        Toggle Presentation
      </button>
      {isPresenting ? (
        <div>
          <button onClick={toggleView}>Toggle View</button>
          {view === "all" && (
            <div>
              <h2>Both Groups View</h2>
              <div className="student-group-view">
                {otherGroups.map((doc, index) => (
                  <React.Fragment key={index}>
                    <iframe
                      className="student-iframe"
                      title={`group ${doc.docIndex}`}
                      src={doc.url}
                    ></iframe>
                  </React.Fragment>
                ))}
              </div>
            </div>
          )}
          {view === "single" && (
            <>
              <div className="student-single-container">
                <h2>Single Doc View</h2>
                <div className="student-single-view">
                  <button onClick={() => handleDocButton("left")}>
                    Previous
                  </button>
                  {otherGroups.map((doc, index) => (
                    <React.Fragment key={index}>
                      {currDocIndex === index && (
                        <iframe
                          className="student-iframe"
                          title={`group ${doc.docIndex}`}
                          src={doc.url}
                        ></iframe>
                      )}
                    </React.Fragment>
                  ))}
                  <button onClick={() => handleDocButton("right")}>Next</button>
                </div>
              </div>
            </>
          )}
        </div>
      ) : (
        <div>
          <h2>Group {docUrls[currGroup].groupName}</h2>
          <iframe
            className="student-iframe"
            title={`group ${docUrls[currGroup].docIndex}`}
            src={docUrls[currGroup].url}
          ></iframe>
        </div>
      )}
    </div>
  );
};

export default Student;
