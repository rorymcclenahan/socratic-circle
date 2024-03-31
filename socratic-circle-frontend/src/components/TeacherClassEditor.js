import React from 'react'
import axios from 'axios'

const TeacherClassEditor = (props) => {
    const handleChange = (event) => {
        const { name, value } = event.target;
        props.setValues({ ...props.values, [name]: value });
    }

    const handleSubmit = (event) => {
        event.preventDefault();
        // Make an axios post call to localhost:3000
        axios.post('http://localhost:3000')
            .then(response => {
                // Handle the response
            })
            .catch(error => {
                // Handle the error
            });
    }

return (
    <div>
        <div>Teacher Class Editor</div>
        <form onSubmit={handleSubmit}>
            <label htmlFor="name">Enter a Class Name:</label>
            <input type="text" id="name" name="name" value={props.name} onChange={handleChange} />
            <button type="submit">Submit</button>
        </form>
    </div>
)
}

export default TeacherClassEditor