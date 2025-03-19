<template>
  <v-card>
    <v-row no-gutters>
      <v-col cols="6">
        <v-carousel hide-delimiters v-if="carouselNews.length" height="300">
          <v-carousel-item v-for="news in carouselNews" :key="news.id">
            <v-img
              :src="'https://agenciadenoticias.ibge.gov.br/' + news.image"
              contain
            >
              <v-container class="fill-height d-flex align-end">
                <v-card-title class="text-white text-h6 text-center bg-dark px-2">
                  {{ news.titulo }}
                </v-card-title>
              </v-container>
            </v-img>
          </v-carousel-item>
        </v-carousel>
      </v-col>

      <v-col cols="6">
        <v-list v-if="listNews.length">
          <v-list-item v-for="news in listNews.slice(0, 4)" :key="news.id">
            <template v-slot:prepend>
              <v-avatar size="64">
                <v-img
                  :src="'https://agenciadenoticias.ibge.gov.br/' + news.image"
                  alt="news"
                ></v-img>
              </v-avatar>
            </template>
            <v-list-item-content>
              <v-list-item-title>{{ news.titulo }}</v-list-item-title>
              <v-list-item-subtitle>{{ news.introducao }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-col>
    </v-row>
  </v-card>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted, inject } from 'vue';

const config = inject("config");
const carouselNews = ref([]);
const listNews = ref([]);

const fetchNews = async () => {
  try {
    const response = await axios.get(`${config.apiUrl}/news/get/${localStorage.locale}`);
    const allNews = response.data.items.slice(0, 10);
    carouselNews.value = allNews.slice(0, 3).map(news => ({
      id: news.id,
      titulo: news.titulo,
      image: JSON.parse(news.imagens).image_intro || '',
      link: news.link
    }));

    listNews.value = allNews.map(news => ({
      id: news.id,
      titulo: news.titulo,
      introducao: news.introducao,
      image: JSON.parse(news.imagens).image_intro || '',
      link: news.link
    }));
  } catch (error) {
    console.error('Error when searching for news:', error);
  }
}

onMounted(fetchNews);

</script>