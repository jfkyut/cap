<script setup>

import { RouterLink } from 'vue-router';

defineProps({ to: String })

</script>

<template>
  <li>
    <RouterLink :to="to" class="flex items-center p-2 transition duration-75 rounded-lg ml-5 group hover:bg-gray-100 text-white hover:bg-gray-700">
      <i class="fa fa-plus mr-2"></i>
      <span>New chat</span>
    </RouterLink>
  </li>
</template>