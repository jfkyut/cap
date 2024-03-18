import { defineStore } from "pinia";
import { ref } from "vue";

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

  const travels = ref(null);

  const travel = ref(null);

  const getTravel = () => {
    
  }

  const addTravel = (newTravel) => {
    travels.value.unshift(newTravel);
  }

  return {
    form,
    travels,
    addTravel,
    emptyForm
  }
})