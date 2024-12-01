import { useState, useEffect } from 'react'

import axios from "axios"
import {BrowserRouter as router , Route, Link, useParams, Router} from "react-router-dom"

import './App.css'
import error from "eslint-plugin-react/lib/util/error.js";

const PostList= ()=>{
    const [posts, setPosts]= useState([]);
    useEffect(()=>{
        axios.get('http://127.0.0.1:8000/api/posts')
            .then(response=>{
                setPosts(response.data)
                })
            .catch(error=>{
                console.error('Errore nel recupero dati', error)
            })
        },[])
    return (
        <div>
            <h1>
                <ul>
                    {
                        posts.map(post=>
                        <li key={post.id}>
                            <Link to={'/posts/${posts.id}'}></Link>

                        </li>)
                    }
                </ul>
            </h1>
        </div>
    )
}

function App() {

  return (
      <Router>
          <Routes>
              <Route path='/' element={<PostList />} />
<Route path='/Posts/:id' element={<PostDetail />} />
                  </Routes>
          </Router>
  )

}

export default App
