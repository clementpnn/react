import { Link } from '@tanstack/react-router'
import { useState, useRef, useEffect } from 'react'

function Post() {

  const [data, setData] = useState({})
  const mounted = useRef(false)

  useEffect(() => {
    if (!mounted.current) {

        fetch("http://localhost:1234/post")
            .then(data => data.json())
            .then(json => setData(json.posts))
    }

    mounted.current = true
}, [])

  return (
    <>
      <h1>Tous les Posts</h1>
      <Link to="/addpost" activeOptions={{ exact: true }}>Créé un post</Link>

      <br />
      <br />
      
      {mounted && Object.keys(data).map((post, key) => {
        return(
          <div key={key}>
            <h3>Titre : {data[post]['title']}</h3>
            <h4>Ecrit par : {data[post]['username']}</h4>
            <h4>Date : {data[post]['date']}</h4>
            <h4>Contenue : {data[post]['content']}</h4>
            <br />
            <br />
          </div>
        )
      })}

    </>
  )
}

export default Post