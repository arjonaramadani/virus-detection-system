<template>
  <div>
    <Navbar />
    <div class="container p-2">
      <h2>Login</h2>
      <b-form @submit.prevent="onSubmit">
        <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
          <b-form-input
            id="input-1"
            v-model="form.email"
            type="email"
            placeholder="Enter email"
          ></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-1" label="Password:" label-for="input-1">
          <b-form-input
            id="input-2"
            v-model="form.password"
            type="password"
          ></b-form-input>
        </b-form-group>

        <div class="py-4">
          <div class="" v-for="(error, key) in errors" :key="key.id">
            <span class="text-danger text-uppercase">{{ key }}:</span>
            <div v-for="(err, key) in error" :key="key.id">
              <span class="text-danger">
                <strong>{{ err }}</strong>
              </span>
            </div>
          </div>
        </div>

        <b-button type="submit" variant="primary">Login</b-button>
      </b-form>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar";
import axios from "axios";

export default {
  components: {
    Navbar,
  },
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();

      axios
        .post(`api/login`, {
          email: this.form.email,
          password: this.form.password,
        })
        .then((response) => {
          const token = response.data.access_token;
          localStorage.setItem("access_token", token);
          this.$router.push("/dashboard");
        })
        .catch((error) => {
          // console.log(error);
          this.errors = error.response.data.errors;
          // console.log(this.errors);
        });
    },
  },
};
</script>

<style>
</style>