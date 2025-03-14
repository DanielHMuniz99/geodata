<template>
<v-navigation-drawer>
  <v-list-item 
    v-for="route in routes"
    :key="route.name"
    @click="openPage(route.path)"
    link
    :title="route.name"
  >
  </v-list-item>
</v-navigation-drawer>
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
