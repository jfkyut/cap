<script setup>
import { useTravelStore } from '@/stores/travel';
import { storeToRefs } from 'pinia';
import { computed, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import TravelControl from './partials/TravelControls.vue';

const { travel, activeTravelId } = storeToRefs(useTravelStore());
const route = useRoute();
const travelId = computed(() => route.params.id);

onMounted(() => {
  activeTravelId.value = travelId.value;
})

watch(travelId, (travelId) => {
  activeTravelId.value = travelId
})

</script>

<template>

  <TravelControl />

  <div class="space-y-6 max-w-4xl mx-auto my-8 lg:my-6">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
          <tr class="border-b dark:border-gray-600">
            <th scope="col" colspan="5" class="px-6 py-3 truncate lg:text-center">
              <span class="text-lg dark:text-gray-300">
                {{ travel?.title }}
              </span>
            </th>
          </tr>
          <tr>
            <th scope="col" class="px-6 py-3 truncate">
                Type
            </th>
            <th scope="col" class="px-6 py-3 truncate">
                Details
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Destination
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.destination.join(', ') }}
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Arrival Date
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.arrival }}
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Departure Date
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.departure }}
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Duration
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.duration }}
            </td>
          </tr>
          
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Activities
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.activities?.length > 0 && travel.plan.activities.join(', ') }}
            </td>
          </tr>

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Accomodation type preference
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.accommodation_suggestion?.length > 0 && travel.plan.accommodation_suggestion.join(', ') }}
            </td>
          </tr>

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Inclusion
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.inclusion?.length > 0 && travel.plan.inclusion.join(', ') }}
            </td>
          </tr>

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[50%] truncate">
              Exclusion
            </th>
            <td class="px-6 py-4 w-[50%] truncate">
              {{ travel?.plan.exclusion?.length > 0 && travel.plan.exclusion.join(', ') }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" v-for="(day, index) in travel?.plan.daily" :key="index">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
          <tr class="border-b dark:border-gray-600">
            <th scope="col" colspan="5" class="px-6 py-3 truncate lg:text-center">
              <span class="text-lg dark:text-gray-300">
                Day {{ day.day }}: {{ day.date }}
              </span>
            </th>
          </tr>
          <tr>
            <th scope="col" class="px-6 py-3 truncate">
              Activity
            </th>
            <th scope="col" class="px-6 py-3 truncate">
              Start time
            </th>
            <th scope="col" class="px-6 py-3 truncate">
              End time
            </th>
            <th scope="col" class="px-6 py-3 truncate">
              Duration
            </th>
            <th scope="col" class="px-6 py-3 truncate">
              Estimated budget
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" v-for="(activity, index) in day.activities" :key="index">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[40%] truncate">
              {{ activity.name }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[15%] truncate">
              {{ activity.start_time }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[15%] truncate">
              {{ activity.end_time }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[15%] truncate">
              {{ activity.duration }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[15%] truncate">
              {{ activity.estimated_budget }}
            </th>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</template>
