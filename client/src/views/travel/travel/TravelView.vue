<script setup>
import { useTravelStore } from '@/stores/travel';
import { storeToRefs } from 'pinia';
import { computed, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';

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
  <div class="space-y-6">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Category
              </th>
              <th scope="col" class="px-6 py-3">
                  Details
              </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Destination
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.destination.join(', ') }}
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Arrival Date
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.arrival }}
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Departure Date
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.departure }}
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Duration
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.duration }}
            </td>
          </tr>
          
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Activities
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.activities?.length > 0 && travel.plan.activities.join(', ') }}
            </td>
          </tr>

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Accomodation type preference
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.accommodation_suggestion?.length > 0 && travel.plan.accommodation_suggestion.join(', ') }}
            </td>
          </tr>

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Inclusion
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.inclusion?.length > 0 && travel.plan.inclusion.join(', ') }}
            </td>
          </tr>

          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Exclusion
            </th>
            <td class="px-6 py-4">
              {{ travel?.plan.exclusion?.length > 0 && travel.plan.exclusion.join(', ') }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" v-for="(day, index) in travel?.plan.daily" :key="index">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Activity
              </th>
              <th scope="col" class="px-6 py-3">
                Start time
              </th>
              <th scope="col" class="px-6 py-3">
                End time
              </th>
              <th scope="col" class="px-6 py-3">
                Duration
              </th>
              <th scope="col" class="px-6 py-3">
                Estimated budget
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" v-for="(activity, index) in day.activities" :key="index">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ activity.name }}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ activity.start_time }}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ activity.end_time }}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ activity.duration }}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ activity.estimated_budget }}
              </th>
            </tr>
          </tbody>
      </table>
    </div>

  </div>
</template>
