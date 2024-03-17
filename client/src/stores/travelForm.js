import { defineStore } from "pinia";
import { ref } from "vue";

export const useTraveFormStore = defineStore('travel-form', () => {

  const fields = {
    arrival: null,
    departure: null,
    places: [],
    accommodations: [],
    activities: [],
    individualCount: null
  }

  const form = ref(fields)

  const emptyForm = () => {
    form.value = fields;
  }

  return {
    form,
    emptyForm
  }
})