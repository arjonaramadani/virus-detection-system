<template>
  <div>
    <Navbar />
    <div class="container py-5">
      <button class="btn btn-primary my-4" @click="addQuestion">Add</button>
      <b-table
        selectable
        striped
        hover
        :select-mode="selectMode"
        @row-selected="onRowSelected"
        :items="items"
      ></b-table>
      <!-- <p>
        Selected Rows:<br />
        {{ selected[0] }}
      </p> -->
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
      modes: ["single"],
      items: [],
      selected: {},
      selectMode: "single",
      id: null,
    };
  },
  created() {
    this.getQuestions();
  },
  methods: {
    onRowSelected(items) {
      this.selected = items;
      // console.log(this.selected[0].id);
      this.id = this.selected[0].id;
      console.log(this.id);
      this.$router.push(`/question/${this.id}`);
    },
    getQuestions() {
      axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("access_token");
        
      axios
        .get("/api/questions")
        .then((response) => {
          //   console.log(response);
          this.items = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addQuestion() {
      this.$router.push("/add-question");
    },
  },
};
</script>
