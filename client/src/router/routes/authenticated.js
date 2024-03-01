import AuthenticatedLayout from '@/layouts/auth/AuthenticatedLayout.vue';
import guards from '@/router/guards/guards';
const { authenticated, verified } = guards();

const authenticatedRoutes = [
  {
    path: '/',
    alias: ['/home', '/dashboard'],
    name: 'home',
    component: () => import('@/views/app/HomeView.vue'),
    meta: {
      layout: AuthenticatedLayout
    },
    beforeEnter: [authenticated, verified]
  },
  {
    path: '/account',
    name: 'account',
    component: () => import('@/views/profile/ProfileView.vue'),
    meta: {
      layout: AuthenticatedLayout
    },
    beforeEnter: [authenticated, verified]
  },
];

export default authenticatedRoutes;