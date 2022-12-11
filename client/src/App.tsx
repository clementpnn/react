import { ChangeEvent, FormEvent, useState } from 'react'
import { Link } from '@tanstack/react-router'

export interface formDataInterface {
  name: string,
  email: string,
  password: string,
  passwordConfirm: string
}

function App() {

  const [formData, setFormData] = useState<formDataInterface>({name: '', email: '', password: '', passwordConfirm: ''})
  const [post, setPost] = useState<boolean>(false)

  const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    
    fetch('http://localhost:1234', {
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
      <h2>Inscription</h2>
      <form onSubmit={handleSubmit}>
        <label htmlFor='name'>name</label>
        <input type='text' name='name' onChange={handleChange} required />

        <label htmlFor='email'>email</label>
        <input type='email' name='email' onChange={handleChange} required />

        <label htmlFor='password'>password</label>
        <input type='password' name='password' onChange={handleChange} required />

        <label htmlFor='passwordConfirm'>password confirm</label>
        <input type='password' name='passwordConfirm' onChange={handleChange} required />

        <input type='submit' value='submit' onClick={() => setPost(true)} />
      </form>

      <br />
      <br />

      <h2>Connection</h2>
      <form onSubmit={handleSubmit}>
        <label htmlFor='email'>email</label>
        <input type='email' name='email' onChange={handleChange} required />

        <label htmlFor='password'>password</label>
        <input type='password' name='password' onChange={handleChange} required />

        <input type='submit' value='submit' onClick={() => setPost(true)} />
      </form>

      <br />
      <br />

      {post &&
        <Link to="/post" activeOptions={{ exact: true }}>Post</Link>
      }
    </>
  )
}

export default App