import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import { ref } from 'vue';

window.Pusher = Pusher;

const authToken = ref(localStorage.getItem('sanctum-token'));


window.Echo = new Echo({
  broadcaster: 'reverb',
  key: import.meta.env.VITE_REVERB_APP_KEY,
  wsHost: import.meta.env.VITE_REVERB_HOST,
  wsPort: import.meta.env.VITE_REVERB_PORT,
  wssPort: import.meta.env.VITE_REVERB_PORT,
  forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
  enabledTransports: ['ws', 'wss'],
  authEndpoint: "http://localhost:8000/broadcasting/auth",
  auth: {
    headers: {
      Authorization : `Bearer ${authToken.value}`
    }
  }
});
