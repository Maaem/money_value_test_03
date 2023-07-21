<script setup>
import { computed, unref } from "vue";
import { useDisplay } from "vuetify";
import { useAuthStore } from "../store";

const authStore = useAuthStore();

const display = useDisplay();
const isSmartphone = computed(() => {
  return unref(display.xs);
});

const routes = [{ to: "/", text: "Déconnexion" }];

/**
 *
 * @param {string} to
 */
function signOut(to) {
  if (to === "/") {
    authStore.logOut();
  }
}
</script>

<template>
  <v-app-bar color="purple" scroll-behavior="elevate">
    <v-app-bar-title>Currency</v-app-bar-title>
    <!-- Menu Mobile -->
    <v-menu v-if="isSmartphone && authStore.user">
      <template v-slot:activator="{ props }">
        <v-app-bar-nav-icon v-bind="props" />
      </template>

      <v-list>
        <v-list-item v-for="{ to, text } in routes" :to="to" :key="to">
          <v-list-item-title @click="signOut(to)">{{ text }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>

    <!-- Menu Desktop -->
    <v-toolbar-items v-else-if="authStore.user">
      <template v-for="{ to, text } in routes" :key="to">
        <v-btn :to="to" variant="text" @click.prevent="signOut(to)">{{
          text
        }}</v-btn>
        <v-divider vertical></v-divider>
      </template>
    </v-toolbar-items>
  </v-app-bar>
</template>