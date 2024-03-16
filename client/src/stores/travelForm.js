import { defineStore } from "pinia";
import { ref } from "vue";

export const useTravelStore = defineStore('travel-form', () => {

  const fields = {
    arrival: null,
    departure: null,
    place: null,
    accommodation: null,
    activities: null,
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