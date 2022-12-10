import ReactDOM from 'react-dom/client'
import {RouterProvider, createReactRouter, createRouteConfig} from '@tanstack/react-router'
import App from './App'
import Test from './test'

const rootRoute = createRouteConfig()

const indexRoute = rootRoute.createRoute({
  path: '/',
  component: () => {
    return (
      <App />
    )
  },
})

const testRoute = rootRoute.createRoute({
  path: '/test',
  component: () => {
    return (
      <Test />
    )
  },
})

const routeConfig = rootRoute.addChildren([
  indexRoute,
  testRoute
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