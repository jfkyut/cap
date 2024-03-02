<script setup>

import { RouterLink } from 'vue-router';

defineProps({ to: String })

</script>

<template>
  <li>
    <RouterLink :to="to" active-class="bg-gray-700" class="flex items-center p-2 transition duration-75 rounded-lg ml-5 group text-white hover:bg-gray-700">
      <i class="fa fa-plus mr-2"></i>
      <span>New chat</span>
    </RouterLink>
  </li>
</template>