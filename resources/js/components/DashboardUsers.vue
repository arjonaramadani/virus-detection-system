<template>
  <div>
    <Navbar />
    <div class="container p-5">
      <div>I anketuari: {{ survey.respondent }}</div>
      <div>Kontakti: {{ survey.respondent_phone }}</div>
      <div>Kontrolluar nga: {{ survey.checked_by }}</div>
      <div>Shenime: {{ survey.notes }}</div>
      <div>Data: {{ survey.created_at }}</div>

      <div class="py-1">
        <p>Pergjigjet:</p>
        <ul v-for="answer in answers" :key="answer.id">
          <li>
            Pyetja:
            <span>{{ answer.question }}</span>
          </li>
          <li>
            Pergjigja:
            <span>{{ answer.answer }}</span>
          </li>
        </ul>
      </div>
      <div>
        <router-link to="/dashboard" class="btn btn-primary my-5"
          >Back</router-link
        >
      </div>

      <form v-show="!survey.checked_by">
        <textarea
          required
          name="notes"
          id=""
          cols="30"
          rows="10"
          v-model="notes"
        >
        </textarea>
        <div>
          <button @click="updateNotes" class="btn btn-primary">Check</button>
        </div>
      </form>
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
      notes: "",
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
    updateNotes() {
      axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("access_token");

      axios
        .put(`/api/survey/${this.id}`, {
          notes: this.notes,
        })
        .then(() => {
          this.$router.push("/dashboard");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
</style>