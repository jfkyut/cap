<script setup>

import TextInput from '@/components/inputs/TextInput.vue';
import DropdownMenu from '@/components/dropdowns/dropdown/DropdownMenu.vue';
import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import { ref } from 'vue';

const barangays = [
  'Poblacion',
  'Port Barton',
  'Alimanguan',
  'Sto. Nino'
]

const showPlacesDropdown = ref(false);

</script>

<template>
  <div class="w-full space-y-2 relative">
    <label for="place">Which Barangay would you want to go to?</label>
    <TextInput 
      @mouseover="showPlacesDropdown = true"
      @mouseout="showPlacesDropdown = false"
      :read-only="true"
      placeholder="Barangays" />

    <DropdownMenu 
      @mouseover="showPlacesDropdown = true"
      @mouseout="showPlacesDropdown = false"
      :show="showPlacesDropdown"
      position="left-0">
      <DropdownButton v-for="(barangay, index) in barangays" :key="index">
        {{ barangay }}
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>