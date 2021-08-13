<template>
  <v-container>
    
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
    </v-card>

    <v-skeleton-loader v-else v-bind="attrs" type="article"></v-skeleton-loader>
  </v-container>
</template>

<script>
  export default {
    name: "MovieDetail",
    data() {
      return {
        attrs: {
          class: "mb-6",
          elevation: 2,
        },
        Movie: null,
        review: false,
      };
    },
    methods: {
      rate() {
        const JWT = this.$cookies.get("JWToken");
        if (JWT === null) {
          window.alert("You must be logged in");
        } else {
          this.review = true;
        }
      },
    },
    mounted() {
      this.$axios({
        method: "GET",
        url: "/api/movies/" + this.$route.params.id,
      }).then((response) => {
        this.Movie = response.data;
      });
    },
  };
</script>

<style></style>
