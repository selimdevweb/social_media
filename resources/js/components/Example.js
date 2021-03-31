import React, {useEffect, useState} from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios'

function Example() {

    const [posts, setposts] = useState([]);

    useEffect(() => {
        axios
        .get(`http://127.0.0.1:8000/axios`)
        .then(res => {
            setposts(res.data)
            console.log(res.data.data)
        })
    }, [])
    return (
        <div>
            {/* <div className="flex justify-center mt-5">
                <div className="w-8/12 bg-white p-6 rounded-lg">
                    {posts.map(post => {
                        <p key ={post.id} >
                        {post.body}</p>
                    })}
                </div>
            </div> */}
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
