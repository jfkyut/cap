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
    {{ travel }}
  </div>
</template>
