import { Link } from '@tanstack/react-router'

function Post() {
  return (
    <>
      <h1>Tous les Posts</h1>
      <Link to="/addpost" activeOptions={{ exact: true }}>Créé un post</Link>
    </>
  )
}

export default Post