<template>
  <div>
    <Navbar />
    <div class="container p-5">
      <div>Respondent: {{ survey.respondent }}</div>
      <div>Checked By: {{ survey.checked_by }}</div>
      <div>Notes: {{ survey.notes }}</div>
      <div>Date: {{ survey.created_at }}</div>
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
    };
  },
  created() {
    this.getSurvey();
  },
  methods: {
    getSurvey() {
      axios.get(`/api/survey/${this.id}`).then((response) => {
        // console.log(response);
        this.survey = response.data;
      });
    },
  },
};
</script>

<style>
</style>