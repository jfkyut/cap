import { createRouter, createWebHistory } from 'vue-router'
import guest from './routes/guest'
import authenticated from './routes/authenticated'
import errorRoutes from './routes/error'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0 }
    }
  },
  routes: [
    ...guest,
    ...authenticated,
    ...errorRoutes
  ]
})

export default router
