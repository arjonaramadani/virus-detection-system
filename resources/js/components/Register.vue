<template>
<div>
    <Navbar/>
  <div class='container p-2'>
      <h2>Register your account</h2>
    <b-form @submit="onSubmit" @reset="onReset">
      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.name"
          required
          placeholder="Enter name"
        ></b-form-input>
      </b-form-group>
      
      <b-form-group
        id="input-group-1"
        label="Email address:"
        label-for="input-1"
      >
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

      <b-form-group
        id="input-group-1"
        label="Confirm Password:"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          v-model="form.confirmPassword"
          type="password"
          required
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
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
          name: '',
          password: '',
          confirmPassword: ''
        },
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
        this.form.email = ''
        this.form.name = ''
        this.form.password = ''
        this.form.confirmPassword = ''
      }
    }
  }
</script>