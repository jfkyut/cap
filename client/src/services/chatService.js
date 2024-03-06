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

  const getChats = () => {
    return sendApiRequest( async () => {
      return await axios.get('/api/chat');
    })
  }

  const getMessages = (id) => {
    return sendApiRequest( async () => {
      return await axios.get(`/api/chat/${id}`);
    });
  }

  return { 
    sendChatRequest, 
    sendMessageRequest, 
    getChats, 
    getMessages 
  }
}