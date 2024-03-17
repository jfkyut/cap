import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest, getCsrfToken } = useApiUtilities();

export const useTravelService = () => {

  const generateTravelItineraryRequest = (form) => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.post('/api/travel', form);
    })
  }

  return { generateTravelItineraryRequest }
}