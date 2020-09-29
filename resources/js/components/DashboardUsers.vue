<template>
  <div>
    <Navbar />
    <div class="container p-5">
      <div>Respondent: {{ survey.respondent }}</div>
      <div>Checked By: {{ survey.checked_by }}</div>
      <div>Notes: {{ survey.notes }}</div>
      <div>Date: {{ survey.created_at }}</div>

      <div class="py-5">
        <p>Answers:</p>
        <ul v-for="answer in answers" :key="answer.id">
          <li>
            Question:
            <span>{{ answer.question }}</span>
          </li>
          <li>
            Answer:
            <span>{{ answer.answer }}</span>
          </li>
        </ul>
      </div>
      <router-link to="/dashboard" class="btn btn-primary my-5"
        >Back</router-link
      >
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
      survey: {},
      id: this.$route.params.id,
      answers: [],
    };
  },
  created() {
    this.getSurvey();
  },
  methods: {
    getSurvey() {
      axios.get(`/api/survey/${this.id}`).then((response) => {
        this.survey = response.data;
        this.answers = response.data.answers;
        console.log(this.survey);
        console.log(this.answers);
      });
    },
  },
};
</script>

<style>
</style>