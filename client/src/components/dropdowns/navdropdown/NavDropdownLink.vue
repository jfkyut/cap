<script setup>

import { RouterLink } from 'vue-router';

defineProps({ to: String, class: String })

</script>

<template>
  <li>
    <RouterLink 
      :to="to" 
      active-class="bg-gray-700" 
      :class="class"
      class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700 truncate">
      <slot />
    </RouterLink>
  </li>
</template>