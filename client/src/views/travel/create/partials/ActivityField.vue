<script setup>

import TextInput from '@/components/inputs/TextInput.vue';
import DropdownMenu from '@/components/dropdowns/dropdown/DropdownMenu.vue';
import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import { ref } from 'vue';

const activities = [
  'Swimming',
  'Hiking',
  'Island hopping',
  'Bicycling',
  'Sky diving'
]

const showActivitiesDropdown = ref(false);

</script>

<template>
  <div class="w-full space-y-2 relative">
    <label for="place">Which activity would you like to do?</label>
    <TextInput 
      @mouseover="showActivitiesDropdown = true"
      @mouseout="showActivitiesDropdown = false"
      placeholder="Activities"
      :read-only="true" />

    <DropdownMenu 
      @mouseover="showActivitiesDropdown = true"
      @mouseout="showActivitiesDropdown = false"
      :show="showActivitiesDropdown"
      position="left-0">
      <DropdownButton v-for="(activity, index) in activities" :key="index">
        {{ activity }}
      </DropdownButton>
    </DropdownMenu>
  </div>
</template>