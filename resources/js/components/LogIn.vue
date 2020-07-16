<template>
  <div>
      <Navbar/>
  <div class='container p-2'>
      <h2>Login </h2>
    <b-form @submit.prevent="onSubmit">
      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          required
          placeholder="Enter email"
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-1"
        label="Password:"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          v-model="form.password"
          type="password"
          required
        ></b-form-input>
      </b-form-group>

      <b-button type='submit' variant="primary">Login</b-button>
    </b-form>
  </div>
  </div>
</template>

<script>
import Navbar from './Navbar';

export default {
    components : {
        Navbar,
    },
    data() {
    return {
        form: {
          email: '',
          password: '',
        },
    methods: {
    onSubmit() {
        console.log(this.form);
        alert(JSON.stringify(this.form))
                }
            } 
        }
    },
}
</script>

<style>

</style>