<template>
  <div>
    <Navbar />
    <b-form @submit.prevent="updateQuestion" class="container">
      <b-form-group id="input-group-1" label="Question" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="question.content"
          required
        ></b-form-input>
      </b-form-group>
      <b-form-group>Nga: {{ question.created_by }}</b-form-group>
      <b-button type="submit" variant="primary">Update</b-button>
      <b-button @click="deleteQuestion" class="btn btn-danger">Delete</b-button>
    </b-form>
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
      question: {},
      id: this.$route.params.id,
    };
  },
  created() {
    this.getQuestion();
  },
  methods: {
    getQuestion() {
      axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("access_token");
      
      axios
        .get(`/api/question/${this.id}`)
        .then((response) => {
          this.question = response.data;
          // console.log(this.question);
        })
        .catch((error) => console.log(error));
    },
    updateQuestion() {
      //   console.log(this.question.content);
      axios
        .put(`/api/question/${this.id}`, {
          content: this.question.content,
        })
        .then(() => {
          this.$router.push("/questions");
        });
    },
    deleteQuestion() {
      axios.delete(`/api/question/${this.id}`).then(() => {
        this.$router.push("/questions");
      });
    },
  },
};
</script>

<style>
</style>