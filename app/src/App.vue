<script setup>
import Header from './components/Header.vue';
import Sidebar from './components/Sidebar.vue';
</script>

<template>
  <v-card class="mx-auto" color="grey-lighten-3">
    <v-layout>
      <Header/>
      <v-main>
        <v-row no-gutters>
          <Sidebar/>
          <v-col cols="12">
            <router-view/>
          </v-col>
        </v-row>
      </v-main>
    </v-layout>
  </v-card>
</template>
