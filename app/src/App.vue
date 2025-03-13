<script setup>
import Header from './components/Header.vue';
import Sidebar from './components/Sidebar.vue';
</script>

<template>
  <v-card class="mx-auto" color="grey-lighten-3">
    <v-layout>
      <Header/>
      <v-main>
        <v-row dense>
          <v-col cols="2">
            <Sidebar/>
          </v-col>
          <v-col cols="10">
            <router-view/>
          </v-col>
        </v-row>
      </v-main>
    </v-layout>
  </v-card>
</template>
