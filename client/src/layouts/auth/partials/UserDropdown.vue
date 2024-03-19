<script setup>

import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import DropdownMenu from '@/components/dropdowns/dropdown/DropdownMenu.vue';
import DropdownLink from '@/components/dropdowns/dropdown/DropdownLink.vue'
import { ref } from 'vue';
import ExtraButton from '@/components/buttons/ExtraButton.vue';
import { useRouter } from 'vue-router';
import { useAuthService } from '@/services/authService';
import { useProfileStore } from '@/stores/profile';
import { storeToRefs } from 'pinia';

const { user } = storeToRefs(useProfileStore());
const { logoutRequest } = useAuthService();

const router = useRouter();

const logout = async () => {
  if (await logoutRequest()) {
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
      <span>{{ user?.name }}</span>
      <i class="fa fa-angle-down ml-2"></i>
    </ExtraButton>

    <DropdownMenu 
      @mouseover="isDropdownShow = true"
      @mouseout="isDropdownShow = false"
      :show="isDropdownShow">
      <DropdownLink to="/account">
        <i class="fa fa-user mr-2"></i>
        <span>Account</span>
      </DropdownLink>
      <DropdownButton @click="logout">
        <i class="fa fa-sign-out mr-2"></i>
        <span>Sign out</span>
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>