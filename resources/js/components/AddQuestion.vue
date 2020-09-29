<template>
  <div>
    <Navbar />
    <b-form @submit.prevent="addQuestion" class="container">
      <b-form-group id="input-group-1" label="Question" label-for="input-1">
        <b-form-input id="input-1" v-model="content" required></b-form-input>
      </b-form-group>
      <b-button type="submit" variant="primary">Add</b-button>
    </b-form>
  </div>
</template>

<script>
import Navbar from "./Navbar";
import axios from "axios";

export default {
  components: { Navbar },
  data() {
    return {
      content: "",
    };
  },
  methods: {
    addQuestion() {
      axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("access_token");

      axios
        .post("/api/questions", {
          content: this.content,
        })
        .then(() => {
          this.$router.push("/questions");
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style>
</style>