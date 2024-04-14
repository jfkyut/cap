import { defineStore } from "pinia";
import { computed, ref } from "vue";
import axios from "axios";

export const useProfileStore = defineStore('profile', () => {

  const user = ref(null);

  // auth
  const isAuthenticated = computed(() => !user.value ? false : true)

  // verified
  const isVerified = computed(() => !user.value?.email_verified_at ? false : true);

  // superuser
  const isSuperUser = computed(() => user.value?.is_admin !== 0 ? true : false);

  const getProfile = async () => {
    if (!user.value) {
      try {
        const { data } = await axios.get('/api/profile');

        user.value = data;
      } catch (error) {
        user.value = null;
      }
    }
  }

  const updateProfile = async (form) => {
    user.value.name = form.name;
    user.value.email = form.email;
  }

  const destroyProfile = async () => user.value = null

  return {
    user,
    isAuthenticated,
    isVerified,
    isSuperUser,
    updateProfile,
    destroyProfile,
    getProfile
  }
});