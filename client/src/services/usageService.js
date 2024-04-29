import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest } = useApiUtilities();

export const useUsageService = () => {
  
  const addNewUsageRequest = (newUsageForm) => {
    return sendApiRequest( async () => {
      await axios.post('/api/usage', newUsageForm)

      return true;
    })
  }

  const getUsageReportRequest = (form) => {
    return sendApiRequest( async () => {
      return await axios.get('/api/usage/pie', { params: form });
    })
  }

  return {
    addNewUsageRequest,
    getUsageReportRequest,
  }
}