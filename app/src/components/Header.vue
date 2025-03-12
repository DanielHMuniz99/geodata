<template>
  <v-app-bar color="teal-darken-4">
    <template v-slot:image>
      <v-img gradient="to top right, rgba(19,84,122,.8), rgba(128,208,199,.8)"></v-img>
    </template>
    <v-app-bar-title class="ml-4 text-left">Geopax</v-app-bar-title>
    <v-spacer></v-spacer>    
    <LanguageDropdown />
  </v-app-bar>
</template>

<script setup>
  import LanguageDropdown from './LanguageDropdown.vue';
</script>
