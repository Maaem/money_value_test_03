import axios, { AxiosError } from "axios";

const apiClient = axios.create({
  baseURL: import.meta.env.VITE_API_ENDPOINT,
  headers: {
    Accept: "Content-Type",
    "Content-Type": "application/json",
  },
});

apiClient.interceptors.response.use(
  (response) => response,
  /**
   * @param {AxiosError} error
   * @returns
   */
  (error) => {
    if (error.response) {
      /**
       * @constant {AxiosError} apiError
       */
      const apiError = error.response.data;
      return Promise.reject(apiError);
    }
    return Promise.reject(error);
  },
);

export const getCsrfToken = async () => {
  await axios.get(import.meta.env.VITE_API_BASEURL + "/sanctum/csrf-cookie");
};

/**
 *
 * @param {{ email:string,password:string }} creditials
 * @returns {Promise<{message:string,status:number,user:{email:string,name:string}}>}
 */
export const signIn = async (creditials) => {
  await getCsrfToken();
  const response = await apiClient.post("/login", creditials);
  return response.data;
};

export const signOut = async () => {
  const response = await apiClient.get("/logout");
  return response.data;
};