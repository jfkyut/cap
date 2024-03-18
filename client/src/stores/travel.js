import { defineStore } from "pinia";
import { computed, ref, watch } from "vue";
import { useTravelService } from "@/services/travelService";

const { getTravelRequest } = useTravelService();

export const useTravelStore = defineStore('travel', () => {

  const form = ref({
    arrival: null,
    departure: null,
    places: [],
    accommodations: [],
    activities: [],
    individual_count: 1
  })

  const emptyForm = () => {
    form.value = {
      arrival: null,
      departure: null,
      places: [],
      accommodations: [],
      activities: [],
      individual_count: 1
    };
  }

  const activeTravelId = ref(null);

  const travel = computed(() => {
    return travels.value?.find((trav) => trav.id === activeTravelId.value)
  })

  const travels = ref(null);

  const addTravel = (newTravel) => {
    travels.value.unshift(newTravel);
  }

  return {
    form,
    travel,
    travels,
    activeTravelId,
    addTravel,
    emptyForm,
  }
})