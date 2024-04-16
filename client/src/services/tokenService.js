import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest, getCsrfToken } = useApiUtilities();

export const useTokenService = () => {

  const getNewSanctumToken = () => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.post('api/sanctum/auth');
    })
  }

  return { getNewSanctumToken }
}