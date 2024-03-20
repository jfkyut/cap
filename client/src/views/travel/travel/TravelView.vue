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
  <div>
    {{ travel?.plan.arrival }}
  </div>
  <div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Product name
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Color
                  </th>
              </tr>
          </thead>
          <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Apple MacBook Pro 17"
                  </th>
                  <td class="px-6 py-4">
                      Silver
                  </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</template>
