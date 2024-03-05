import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest, getCsrfToken } = useApiUtilities();

export const useChatService = () => {

  const sendNewChatRequest = (message) => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      const { data } = await axios.post('/api/chat', { message: message });

      console.log(data);

      return data;
    });
  }

  return { sendNewChatRequest }
}