<script setup>

import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import GenericModal from '@/components/modals/GenericModal.vue';

</script>

<template>
  <DropdownButton class="hover:text-blue-600 dark:hover:text-blue-400">
    <i class="fa fa-edit mr-2"></i>
    <span>Edit chat title</span>
  </DropdownButton>

  <div>
    <GenericModal
      title="Edit">
      asdasd
    </GenericModal>
  </div>
</template>