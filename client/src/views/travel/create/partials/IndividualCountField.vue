<script setup>

import TextInput from '@/components/inputs/TextInput.vue'
import { useTraveFormStore } from '@/stores/travelForm';
import { storeToRefs } from 'pinia';

const { form } = storeToRefs(useTraveFormStore());

</script>

<template>
  <div class="w-full space-y-2">
    <label for="place">How many of you will visit?</label>
    <TextInput 
      type="number"
      placeholder="Visitor count"
      v-model="form.individual_count" />
  </div>
</template>