import { useApiUtilities } from "@/utilities/api"
import axios from "axios";

const { sendApiRequest, getCsrfToken } = useApiUtilities();

export const useChatService = () => {

  const sendChatRequest = (message) => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.post('/api/chat', { message: message });
    });
  }

  const sendMessageRequest = (message, id) => {
    return sendApiRequest( async () => {
      await getCsrfToken();
      return await axios.post(`/api/message/${id}`, { message: message });
    })
  }

  const getChat = (id) => {
    return sendApiRequest( async () => {
      await axios.get(`/api/chat/${id}`);
    });
  }

  return { sendChatRequest, sendMessageRequest, getChat }
}