<template>
  <v-container>
    <p class="text-h4 text-center">Category Detail Page</p>
    <v-card v-if="Category">
      <v-card-title>
        {{ Category.name }}
      </v-card-title>
      <v-card-text v-for="movie in Category.movies" :key="movie.id">
        Name: {{ movie.title }} Synopsis: {{ movie.synopsis }}
        <router-link :to="{ name: 'MovieDetail', params: { id: movie.id } }"
          >Details</router-link
        >
      </v-card-text>
    </v-card>

    <v-skeleton-loader
      v-else
      v-for="(i, index) in loaders"
      :key="index"
      v-bind="attrs"
      type="article"
    ></v-skeleton-loader>
  </v-container>
</template>

<script>
  import axios from "axios";
  export default {
    name: "CategoryDetail",
    data() {
      return {
        loaders: [0, 1, 2, 3, 4],
        attrs: {
          class: "mb-2",
          elevation: 2,
        },
        Category: null,
      };
    },
    created() {
      axios({
        method: "GET",
        url: "/api/categories/" + this.$route.params.id,
      }).then((response) => {
        this.Category = response.data;
      });
    },
  };
</script>
