<template>
  <div>
    <Navbar />
    <div class="container p-2">
      <h2>Register your account</h2>
      <b-form @submit.prevent="onSubmit" @reset="onReset">
        <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
          <b-form-input
            id="input-1"
            v-model="form.name"
            placeholder="Enter name"
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-1"
          label="Email address:"
          label-for="input-1"
        >
          <b-form-input
            id="input-2"
            v-model="form.email"
            type="email"
            placeholder="Enter email"
          ></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-1" label="Password:" label-for="input-1">
          <b-form-input
            id="input-3"
            v-model="form.password"
            type="password"
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-1"
          label="Confirm Password:"
          label-for="input-1"
        >
          <b-form-input
            id="input-4"
            v-model="form.confirmPassword"
            type="password"
          ></b-form-input>
        </b-form-group>

        <div class="py-4">
          <div class="" v-for="(error, key) in errors" :key="key.id">
            <span class="text-red">{{ key }}:</span>
            <div v-for="(err, key) in error" :key="key.id">
              <span class="text-red">{{ err }}</span>
            </div>
          </div>
        </div>

        <b-button type="submit" variant="primary">Submit</b-button>
        <b-button type="reset" variant="danger">Reset</b-button>
      </b-form>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar";

export default {
  components: {
    Navbar,
  },
  data() {
    return {
      errors: [],
      form: {
        email: null,
        name: null,
        password: null,
        confirmPassword: null,
      },
    };
  },
  methods: {
    onSubmit(evt) {
      if (this.form.password === this.form.password_confirmation) {
        this.errors.push("Fjalekalimet duhet te jene te njejta.");
      } else {
        this.errors = [];

        // console.log(`${this.form.name}`);

        evt.preventDefault();
        axios
          .post(`api/register`, {
            name: this.form.name,
            email: this.form.email,
            password: this.form.password,
            password_confirmation: this.form.password_confirmation,
          })
          .then((response) => {
            const token = response.data.access_token;
            localStorage.setItem("access_token", token);
            this.$router.push("/login");
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            // console.log(this.errors);
          });
      }
    },
    onReset(evt) {
      evt.preventDefault();
      this.form.email = null;
      this.form.name = null;
      this.form.password = null;
      this.form.confirmPassword = null;
      this.errors = [];
    },
  },
};
</script>