import { Link } from '@tanstack/react-router'
import { ChangeEvent, FormEvent, useState } from 'react'

export interface formDataInterface {
  title: string,
  content: string,
}

function AddPost() {

  const [formData, setFormData] = useState<formDataInterface>({title: '', content: ''})

  const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    
    fetch('http://localhost:1234/addpost', {
      method: 'POST',
      mode: 'cors',
      body: new URLSearchParams({
        ...formData
      }),
      credentials: 'include',
      headers: new Headers({
        // 'Authorization' : 'Basic amZnbWFpbC5jb206cGFzc3dvcmQ=',
        'Content-type':  'application/x-www-form-urlencoded'
      })
    })
      .then(data => data.text())
      .then(json => console.log(json))
  }

  const handleChange = (e: ChangeEvent) => {
    setFormData(prevState => {
      return {
        ...prevState,
        // @ts-ignore
        [e.target.name]: e.target.value
      }
    })
  }
  return (
    <>
      <h1>Créé un post</h1>
      <Link to="/post" activeOptions={{ exact: true }}>retour aux posts</Link>

      <br />
      <br />

      <form onSubmit={handleSubmit}>
        <label htmlFor='title'>titre</label>
        <input type='text' name='title' onChange={handleChange} required />

        <label htmlFor='content'>contenue</label>
        <input type='text' name='content' onChange={handleChange} required />

        <input type='submit' value='submit' />
      </form>
    </>
  )
}

export default AddPost