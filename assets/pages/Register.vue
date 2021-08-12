<template>
  <v-container grid-list-xs>
    Registration form
    <template>
      <v-form v-model="valid" ref="form" lazy-validation>
        <v-text-field
          label="Username"
          v-model="username"
          :rules="usernameRules"
          :counter="10"
          required
        ></v-text-field>
        <v-text-field
          label="Password"
          v-model="password"
          hint="At least 5 characters"
          min="5"
          :append-icon="showPswd ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="showPswd = !showPswd"
          value="Password"
          :rules="passwordRules"
          :type="showPswd ? 'password' : 'text'"
        ></v-text-field>
        <!-- <v-select
          label="Item"
          v-model="select"
          :items="items"
          :rules="[(v) => !!v || 'Item is required']"
          required
        ></v-select> -->

        <v-btn @click="submit" :disabled="!valid">
          submit
        </v-btn>
        <v-btn @click="clear">clear</v-btn>
      </v-form>
    </template>
  </v-container>
</template>

<script>
  import axios from "axios";

  export default {
    name: "Register",
    data: () => ({
      showPswd: "password",
      valid: true,
      username: "",
      usernameRules: [
        (v) => !!v || "Username is required",
        (v) =>
          (v && v.length <= 10) || "Username must be less than 10 characters",
        (v) => (v && v.length >= 5) || "Username must be at least 5 characters",
      ],
      password: "",
      passwordRules: [
        (v) => !!v || "Password is required",
        (v) =>
          (v && v.length <= 10) || "Password must be less than 10 characters",
        (v) => (v && v.length >= 5) || "Password must be at least 5 characters",
      ],
      select: null,
      items: ["Item 1", "Item 2", "Item 3", "Item 4"],
    }),

    methods: {
      submit() {
        if (this.$refs.form.validate()) {
          // Native form submission is not yet supported
          axios
            .post("/register", {
              username: this.username,
              password: this.password,
            })
            .then((response) => {
              console.log(response);
              if (response.status === 200) {
                window.alert("Registration OK");
              }
            })
            .catch((error) => {
              console.log(error);
            });
        }
      },
      clear() {
        this.$refs.form.reset();
      },
    },
  };
</script>

<style></style>
