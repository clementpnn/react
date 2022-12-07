import { useState } from 'react'
import { Link } from '@tanstack/react-router'

export interface formDataInterface {
  username: string,
  email: string,
  password: string,
  passwordConfirm: string
}

function App() {

  const [formData, setFormData] = useState<formDataInterface>({name: '', email: '', password: '', passwordConfirm: ''})

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
        [e.target.name]: e.target.value
      }
    })
  }

  return (
    <>
      <form onSubmit={handleSubmit}>
        <label htmlFor='name'>name</label>
        <input type='text' name='name' onChange={handleChange} />

        <label htmlFor='email'>email</label>
        <input type='email' name='email' onChange={handleChange} />

        <label htmlFor='password'>password</label>
        <input type='password' name='password' onChange={handleChange} />

        <label htmlFor='passwordConfirm'>password confirm</label>
        <input type='password' name='passwordConfirm' onChange={handleChange} />

        <input type='submit' value='submit' />
      </form>

      <Link to="/test" activeProps={{className: 'font-bold'}} activeOptions={{ exact: true }}>
        Home
      </Link>
    </>
  )
}

export default App