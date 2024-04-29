import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest } = useApiUtilities();

export const useUsageService = () => {
  
  const addNewUsageRequest = (newUsageForm) => {
    return sendApiRequest( async () => {
      await axios.post('/api/usage', newUsageForm)
    })
  }

  return {
    addNewUsageRequest
  }
}