<script setup>
import Nav from './components/Nav.vue';
</script>

<template>
  <v-layout>
    <header>
      <Nav/>
    </header>
    <v-main>
      <v-container> <router-view /> </v-container>
    </v-main>
  </v-layout>

</template>

