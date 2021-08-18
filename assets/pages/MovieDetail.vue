<template>
  <v-container>
    <v-card v-if="Movie">
      <v-card-title>
        {{ Movie.originalTitle }}
      </v-card-title>
      <v-card-text>
        Synopsis: {{ Movie.synopsis }}
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">
                  Language
                </th>
                <th class="text-left">
                  Title
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>En</td>
                <td v-if="Movie.enTranslation" >{{ Movie.enTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>Fr</td>
                <td v-if="Movie.frTranslation" >{{ Movie.frTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>De</td>
                <td v-if="Movie.deTranslation" >{{ Movie.deTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>Es</td>
                <td v-if="Movie.esTranslation" >{{ Movie.esTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>Zh</td>
                <td v-if="Movie.zhTranslation" >{{ Movie.zhTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>It</td>
                <td v-if="Movie.itTranslation" >{{ Movie.itTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>Ja</td>
                <td v-if="Movie.jaTranslation" >{{ Movie.jaTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
              <tr>
                <td>Ru</td>
                <td v-if="Movie.ruTranslation" >{{ Movie.ruTranslation.title }}</td>
                <td v-else>not available</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
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
        url: "/api/movies/" + this.$route.params.slug,
      }).then((response) => {
        this.Movie = response.data;
      });
    },
  };
</script>

<style></style>
