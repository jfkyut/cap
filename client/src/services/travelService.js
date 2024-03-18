import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest, getCsrfToken } = useApiUtilities();

export const useTravelService = () => {

  const getAllTravelRequest = () => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.get('/api/travel');
    })
  }

  const getTravelRequest = (id) => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.get(`/api/travel/${id}`);
    })
  }

  const generateTravelRequest = (form) => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.post('/api/travel', form);
    })
  }

  return { 
    getAllTravelRequest,
    getTravelRequest,
    generateTravelRequest 
  }
}