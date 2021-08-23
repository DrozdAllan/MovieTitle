<template>
  <v-container class="center">
    <v-row>
      <v-spacer class="hidden-sm-and-down" />
      <v-col>
        <p class="text-h4 text-center">Welcome to Movies Title !</p>
        <p class="text-h6 text-center">
          Get the name of your favorite movie in every language
        </p>
      </v-col>
      <v-spacer class="hidden-sm-and-down" />
      <!-- <v-col>
        <v-menu
          v-if="JWToken === null"
          :close-on-content-click="false"
          bottom
          offset-y
          nudge-bottom="5"
          rounded="lg"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark v-bind="attrs" v-on="on">
              Login
            </v-btn>
          </template>

          <v-card>
            <v-container>
              <v-col cols="12">
                <v-text-field
                  :counter="10"
                  label="Username"
                  v-model="username"
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  :counter="10"
                  label="Password"
                  v-model="password"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-btn @click="login">Login</v-btn>
                <router-link to="register" class="text-caption"
                  >Not registered yet ?</router-link
                >
              </v-col>
            </v-container>
          </v-card>
        </v-menu>

        <v-btn link to="account" v-else>Account</v-btn>
      </v-col> -->
    </v-row>
    <p class="text-center text-h5 py-10">Random Movie</p>
    <v-row v-if="randomMovie !== null" justify="center">
      <router-link
        :to="{ name: 'MovieDetail', params: { slug: randomMovie.slug } }"
      >
        <v-img
          max-height="500"
          max-width="300"
          :src="require('../../src/images/' + randomMovie.poster)"
        ></v-img>
      </router-link>
    </v-row>
    <v-row justify="center" class="py-10">
      <v-btn @click="getRandomMovie" :loading="loading" color="green lighten-1"
        >Randomize</v-btn
      >
    </v-row>
    <v-row justify="center" v-if="searchStatus">
      <v-spacer class="col-4 hidden-sm-and-down" />
      <v-col cols="6" class="col-md-2">
        <v-text-field
          color="green lighten-1"
          v-model="title"
          label="Title of the movie"
          required
          @keypress.enter="findMovie"
        ></v-text-field>
      </v-col>
      <v-col cols="6" class="col-md-2">
        <v-select
          color="green lighten-1"
          v-model="titleLanguage"
          :menu-props="{ top: true, offsetY: true }"
          :items="languages"
          label="Language of the title"
        ></v-select>
      </v-col>
      <v-spacer class="col-4 hidden-sm-and-down" />
      <v-btn @click="findMovie" color="green lighten-1">search !</v-btn>
    </v-row>
    <v-row v-else>
      <v-btn @click="resetSearch" color="green lighten-1">new search</v-btn>
    </v-row>
    <v-row>
      <v-col v-if="searchResult !== ''">
        <v-card>
          <v-card-title>
            There is {{ numberResult }} result<span v-if="numberResult >= 2"
              >s</span
            ></v-card-title
          >
          <v-card-text v-for="result in searchResult" :key="result.id">
            Title: {{ result.title }} Original Title:
            {{ result.movie.originalTitle }} Synopsis:
            {{ result.movie.synopsis }}
            <router-link
              :to="{ name: 'MovieDetail', params: { slug: result.movie.slug } }"
              >Details</router-link
            >
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  export default {
    name: "Home",
    props: {},
    data: () => ({
      randomMovie: null,
      searchStatus: true,
      loading: false,
      title: "",
      titleLanguage: "",
      searchResult: "",
      numberResult: "",
      admin: false,
      username: "",
      password: "",
      JWToken: "",
      languages: [
        { text: "en", value: "en" },
        { text: "fr", value: "fr" },
        { text: "de", value: "de" },
        { text: "it", value: "it" },
        { text: "ja", value: "ja" },
        { text: "ru", value: "ru" },
        { text: "zh", value: "zh" },
      ],
    }),
    methods: {
      getRandomMovie() {
        this.loading = true;
        this.$axios({
          method: "GET",
          url: "/api/movies/randomize",
          params: {
            number: 1,
          },
        }).then((response) => {
          this.randomMovie = response.data["hydra:member"][0];
          this.loading = false;
        });
      },
      findMovie() {
        this.searchStatus = false;

        this.$axios({
          method: "GET",
          url: "/api/" + this.titleLanguage + "_translations",
          params: {
            title: this.title,
          },
        }).then((response) => {
          this.searchResult = response.data["hydra:member"];
          this.numberResult = response.data["hydra:totalItems"];
        });
      },
      resetSearch() {
        this.searchStatus = true;
        this.title = "";
      },
      login() {
        this.$axios({
          method: "POST",
          url: "/login",
          data: {
            username: this.username,
            password: this.password,
          },
        })
          .then((response) => {
            this.$cookies.set("JWToken", response.data.token, 0);
            window.alert("Logged in !");
            location.reload();
          })
          .catch((error) => {
            if (error.response.status === 401) {
              window.alert("bad credentials");
            }
          });
      },
    },
    mounted() {
      this.JWToken = this.$cookies.get("JWToken");
    },
  };
</script>
