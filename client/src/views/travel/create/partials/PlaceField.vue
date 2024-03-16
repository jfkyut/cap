<script setup>

import TextInput from '@/components/inputs/TextInput.vue';
import DropdownMenu from '@/components/dropdowns/dropdown/DropdownMenu.vue';
import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';

</script>

<template>
  <div class="w-full space-y-2 relative bg-red-500">
    <label for="place">Which Barangay would you want to go to?</label>
    <TextInput />

    <DropdownMenu position="left-0">
      <DropdownButton>
        asdasd
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>