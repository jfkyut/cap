<script setup>

import DropdownMenu from '@/components/dropdowns/dropdown/DropdownMenu.vue';
import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';

</script>

<template>
  <div class="relative">
    <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
      <i class="fa fa-ellipsis-vertical"></i>
      <span class="sr-only">Options</span>
    </button>

    <DropdownMenu position="bottom-14">
      <DropdownButton>
        <i class="fa fa-message mr-2"></i>
        <span>Preset messages</span>
      </DropdownButton>
      <DropdownButton>
        <i class="fa fa-edit mr-2"></i>
        <span>Edit chat title</span>
      </DropdownButton>
      <DropdownButton>
        <i class="fa fa-trash mr-2"></i>
        <span>Delete chat</span>
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>