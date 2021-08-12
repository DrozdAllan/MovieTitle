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
      <v-btn @click="rate">Rate this movie</v-btn>
      <v-rating
        empty-icon="mdi-star-outline"
        full-icon="mdi-star"
        hover
        length="5"
        size="64"
        value="0"
        v-model="ratingValue"
      ></v-rating>
      <v-btn @click="submitRating" :disabled="ratingValue === 0">
        Review !
      </v-btn>
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
        ratingValue: 0,
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
      submitRating() {
        this.$axios({
          method: "PATCH",
          url: "/api/movies/" + this.$route.params.id,
          data: {
            rating: this.ratingValue,
          },
        }).then((response) => {
          this.Movie = response.data;
        });
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
