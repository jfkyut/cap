import ErrorLayout from '@/layouts/error/ErrorLayout.vue';

const errorRoutes = [
  {
    path: '/:notfound(.*)*',
    name: 'Not found',
    component: () => import('@/views/errors/NotFound.vue'),
    meta: {
      layout: ErrorLayout,
      title: 'Page not found'
    },
  },
]

export default errorRoutes;