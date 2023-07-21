import { defineStore } from "pinia";
import { useRouter } from "vue-router";
import { ref } from "vue";

import { signIn, signOut } from "../api";

export const useAuthStore = defineStore(
  "auth",
  () => {
    const user = ref(null);
    const error = ref(null);
    const router = useRouter();

    /**
     * @param {{ email:string,password:string }} creditials
     */
    const logIn = async (creditials) => {
      try {
        const response = await signIn(creditials);
        if (response.status === 201) {
          user.value = response.user;
          router.push("/admin");
        }
      } catch (err) {
        error.value = err;
      }
    };
    const logOut = async () => {
      try {
        const response = await signOut();
        if (response.status === 200) {
          user.value = null;
          router.push("/");
        }
      } catch (err) {
        error.value = err;
      }
    };
    return { logIn, user, error, logOut };
  },
  {
    persist: true,
  },
);