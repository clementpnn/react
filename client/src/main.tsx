import ReactDOM from 'react-dom/client'
import {RouterProvider, createReactRouter, createRouteConfig} from '@tanstack/react-router'
import App from './App'
import Post from './post'
import AddPost from './addPost'

const rootRoute = createRouteConfig()

const indexRoute = rootRoute.createRoute({
  path: '/',
  component: () => {
    return (
      <App />
    )
  },
})

const postRoute = rootRoute.createRoute({
  path: '/post',
  component: () => {
    return (
      <Post />
    )
  },
})

const addPostRoute = rootRoute.createRoute({
  path: '/addpost',
  component: () => {
    return (
      <AddPost />
    )
  },
})

const routeConfig = rootRoute.addChildren([
  indexRoute,
  postRoute,
  addPostRoute
])

const router = createReactRouter({
  routeConfig,
})

const rootElement = document.getElementById('root') as HTMLElement
if (!rootElement.innerHTML) {
  const root = ReactDOM.createRoot(rootElement)
  root.render(
    <RouterProvider router={router} />
  )
}