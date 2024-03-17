import { defineStore } from "pinia";
import { ref } from "vue";

export const useTraveFormStore = defineStore('travel-form', () => {

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

  return {
    form,
    emptyForm
  }
})