<template>
  <v-container>
    <p class="text-h4 text-center">(you must login to review movies)</p>

    <v-card v-if="Movie">
      <v-card-title>
        {{ Movie.title }}
      </v-card-title>
      <v-card-text>
        Synopsis: {{ Movie.synopsis }}
        <router-link
          :to="{ name: 'CategoryDetail', params: { id: Movie.category.id } }"
          >Movies of the same genre</router-link
        >
      </v-card-text>
      <v-btn v-if="auth !== ''">rate this movie</v-btn>
    </v-card>

    <v-skeleton-loader v-else v-bind="attrs" type="article"></v-skeleton-loader>
  </v-container>
</template>


<script>
  import axios from "axios";
  import vueCookies from 'vue-cookies';
  export default {
    name: "MovieDetail",
    data() {
      return {
        attrs: {
          class: "mb-6",
          elevation: 2,
        },
        Movie: null,
        auth: "",
      };
    },
    mounted() {
      axios({
        method: "GET",
        url: "/api/movies/" + this.$route.params.id,
      }).then((response) => {
        this.Movie = response.data;
      });
      console.log(vueCookies.get('foo'));
      console.log(vueCookies.get('PHPSESSID'));
      this.auth = document.cookie;
    },
  };
</script>

<style></style>
