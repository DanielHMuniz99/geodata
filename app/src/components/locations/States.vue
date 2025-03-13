<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="12">
        <v-card-title class="text-h6">{{ $t('states_list') }}</v-card-title>
        <v-card-text>
          <v-data-table
            :headers="headers"
            :items="states"
            :loading="loading"
            :loading-text="t('region')"
            class="text-center"
            :footer-props="footerProps"
          ></v-data-table>
        </v-card-text>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>
  import { ref, onMounted, inject } from 'vue'
  import axios from 'axios'
  import { useI18n } from 'vue-i18n';

  const { t, locale } = useI18n();
  const config = inject("config");
  const states = ref([])
  const loading = ref(true)
  
  const footerProps = {
    itemsPerPageText: t('items_per_page'),
    pageText: `{0}-{1} ${t('of')} {2}`,
  }

  const headers = [
    { title: t('name'), key: 'nome', align: 'center' },
    { title: t('abbreviation'), key: 'sigla', align: 'center' },
    { title: t('region'), key: 'regiao.nome', align: 'center' },
  ]
  
  const fetchStates = async () => {
    try {
      const response = await axios.get(`${config.apiUrl}/locations/states`);
      states.value = response.data
    } catch (error) {
      console.error('Error when searching for states:', error)
    } finally {
      loading.value = false
    }
  }
  
  onMounted(fetchStates)
</script>  