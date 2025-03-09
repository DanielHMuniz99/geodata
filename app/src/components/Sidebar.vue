<template>
  <aside class="sidebar">
    <h5 class="text-center">API</h5>
    <v-row>
      <v-col
        cols="12"
        md="12"
      >
        <div 
          v-for="route in routes" 
          :key="route.name" 
          @click="openPage(route.path)"
          class="mt-2 clickable"
        >
          {{ route.name }}
        </div>
      </v-col>
    </v-row>
  </aside>
</template>

<script setup>
import { ref, computed } from "vue";
import { useRouter } from 'vue-router';

const router = useRouter();

const openPage = (path) => {
  router.push(path);
};

const routes = computed(() => {
  return router.getRoutes().filter(route => route.path !== '/');
});

</script>
