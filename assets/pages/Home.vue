<template>
  <v-container class="center">
    <v-row>
      <v-spacer />
      <v-col>
        <p class="text-h4 text-center">Welcome to Movies Title !</p>
        <p class="text-h5 text-center">
          Get the name of your favorite movie in every language
        </p>
      </v-col>
      <v-col>
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
      </v-col>
    </v-row>
    <p>Movies of the week</p>
    <v-row>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
    </v-row>
    <v-row justify="center" v-if="searchStatus">
      <v-spacer class="col-4" />
      <v-col cols="2">
        <v-text-field
          v-model="title"
          label="Title of the movie"
          required
          @keypress.enter="findMovie"
        ></v-text-field>
      </v-col>
      <v-col cols="2">
        <v-select
          v-model="titleLanguage"
          :items="languages"
          label="Language of the title"
        ></v-select>
      </v-col>
      <v-spacer class="col-4" />
      <v-btn @click="findMovie">search !</v-btn>
    </v-row>
    <v-row v-else>
      <v-btn @click="resetSearch">new search</v-btn>
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
            Title: {{ result.title }} Original Title: {{ result.movie.originalTitle }} Synopsis: {{ result.movie.synopsis }}
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
      searchStatus: true,
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
      ],
    }),
    methods: {
      findMovie() {
        this.searchStatus = false;

        this.$axios({
          method: "GET",
          url: "/api/" + this.titleLanguage + "_translations",
          params: {
            title: this.title,
          },
        }).then((response) => {
          const data = response.data;
          console.log(data);
          this.searchResult = data["hydra:member"];
          this.numberResult = data["hydra:totalItems"];
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
