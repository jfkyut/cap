<script setup>

import DropdownButton from '@/components/dropdowns/DropdownButton.vue';
import DropdownMenu from '@/components/dropdowns/DropdownMenu.vue';
import DropdownLink from '@/components/dropdowns/DropdownLink.vue'
import { ref } from 'vue';
import ExtraButton from '@/components/buttons/ExtraButton.vue';
import { useRouter } from 'vue-router';
import { useAuthService } from '@/services/authService';
import { useProfileStore } from '@/stores/profile';
import { storeToRefs } from 'pinia';

const { user } = storeToRefs(useProfileStore());
const { logout } = useAuthService();

const router = useRouter();

const logoutUser = async () => {
  if (await logout()) {
    user.value = null;
    router.push('/login');
  }
}

defineProps({ user: Object })

const isDropdownShow = ref(false);

</script>

<template>
  <div class="relative">
    <ExtraButton
      disabled
      @mouseover="isDropdownShow = true"
      @mouseout="isDropdownShow = false">
      {{ user?.name }}
    </ExtraButton>

    <DropdownMenu 
      @mouseover="isDropdownShow = true"
      @mouseout="isDropdownShow = false"
      :show="isDropdownShow">
      <DropdownLink to="/account">
        <i class="fa fa-user mr-2"></i>
        <span>Account</span>
      </DropdownLink>
      <DropdownButton @click="logoutUser">
        <i class="fa fa-sign-out mr-2"></i>
        <span>Sign out</span>
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>