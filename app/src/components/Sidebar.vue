<template>
  <aside class="sidebar">
    <h5 class="text-center">API</h5>
    <div class="row">
      <div>
        options
      </div>
    </div>
  </aside>
</template>
<script setup>
  import { ref } from "vue";
  import { useRouter } from 'vue-router';
  import { inject } from 'vue';

  const config = inject('config');
  const ligas = ref([]);
  const searchQuery = ref("");
  const router = useRouter();
</script>
