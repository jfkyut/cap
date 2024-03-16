<script setup>

import TextInput from '@/components/inputs/TextInput.vue';
import DropdownMenu from '@/components/dropdowns/dropdown/DropdownMenu.vue';
import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import { ref } from 'vue';

const accomodationTypes = [
  'Hotel',
  'Lodging House',
  'Resort',
  'Hostel'
]

const showAccomodationTypesDropdown = ref(false);

</script>

<template>
  <div class="w-full space-y-2 relative">
    <label for="place">Which type of accommodation do you prefer?</label>
    <TextInput 
      @mouseover="showAccomodationTypesDropdown = true"
      @mouseout="showAccomodationTypesDropdown = false"
      placeholder="Accomodation type"
      :read-only="true" />

    <DropdownMenu 
      @mouseover="showAccomodationTypesDropdown = true"
      @mouseout="showAccomodationTypesDropdown = false"
      :show="showAccomodationTypesDropdown"
      position="left-0">
      <DropdownButton v-for="(accommodationType, index) in accomodationTypes" :key="index">
        {{ accommodationType }}
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>