<script setup>

import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import { useTravelStore } from '@/stores/travel';
import { storeToRefs } from 'pinia';
import GenericModal from '@/components/modals/GenericModal.vue';

const { travel } = storeToRefs(useTravelStore())

</script>

<template>
  <DropdownButton>
    <i class="fa fa-edit mr-3"></i>
    <span>Edit</span>
  </DropdownButton>

  <div>
    <GenericModal>
      
    </GenericModal>
  </div>
</template>