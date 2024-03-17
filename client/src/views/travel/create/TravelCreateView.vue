<script setup>

import PrimaryButton from '@/components/buttons/PrimaryButton.vue';
import PlaceField from './partials/PlaceField.vue';
import AccomodationField from './partials/AccomodationField.vue';
import ActivityField from './partials/ActivityField.vue';
import IndividualCountField from './partials/IndividualCountField.vue';
import ArrivalField from './partials/ArrivalField.vue';
import DeperatureField from './partials/DepartureField.vue';
import { useTraveFormStore } from '@/stores/travelForm';
import { useTravelService } from '@/services/travelService';
import { storeToRefs } from 'pinia';

const { generateTravelItineraryRequest } = useTravelService();
const { emptyForm } = useTraveFormStore()
const { form } = storeToRefs(useTraveFormStore());

const generateTravelItinerary = () => {
  console.log(form.value);

  emptyForm()
}

</script>

<template>
  <form @submit.prevent="generateTravelItinerary" class="rounded-lg dark:bg-gray-800 border dark:border-gray-700 w-full max-w-4xl mx-auto my-6">
    <header class="p-4 lg:p-6 border-b dark:border-gray-700">
      <h1 class="dark:text-white font-bold text-xl text-center">Create Travel Itinerary</h1>
    </header>


    <div class="p-4 lg:p-6 border-b dark:border-gray-700 flex flex-col md:flex-row gap-4">
      <ArrivalField />
      <DeperatureField />
    </div>

    <div class="p-4 lg:p-6 border-b dark:border-gray-700 flex flex-col md:flex-row gap-4">
      <PlaceField />
      <AccomodationField />
    </div>

    <div class="p-4 lg:p-6 border-b dark:border-gray-700 flex flex-col md:flex-row gap-4">
      <ActivityField />
      <IndividualCountField />
    </div>

    <div class="p-4 lg:p-6 flex justify-end">
      <PrimaryButton type="submit">
        <span>Generate Travel Itinerary</span>
        <i class="fa fa-wand-magic-sparkles ml-2"></i>
      </PrimaryButton>
    </div>

  </form>
</template>