import { createApp } from "vue";
import { createPinia } from "pinia";

import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import * as labsComponents from "vuetify/labs/components"; //

import App from "./App.vue";
import router from './router'

import './axios' 
import './style.css'



const app = createApp(App);
const pinia = createPinia();

app.use(
  createVuetify({
    components: { ...components, ...labsComponents },
    directives,
    icons: { defaultSet: "mdi" },
  }),
);

app.use(pinia);
app.use(router);

app.mount("#app");