<template>
  <v-container>
    Your account Your ApiKey is : {{ apiKey }}
  </v-container>
</template>

<script>
  export default {
    name: "Account",
    data() {
      return {
        apiKey: "",
      };
    },
    mounted() {
      this.$axios({
        method: "POST",
        url: "/decodeJWT",
        data: {
          JWT: this.$cookies.get("JWToken"),
        },
      })
        .then((response) => {
          this.apiKey = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  };
</script>

<style></style>
