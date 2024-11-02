<!-- components/QuizList.vue -->
<template>
  <div style="margin-top: 50px">
    <h2>Quizzes</h2>
    <div v-if="quizzes.length > 0">
      <router-link
        v-for="quiz in quizzes"
        :key="quiz.id"
        class="btn btn-primary m-2"
        :to="`/course/quiz/${quiz.id}`"
      >
        {{ quiz.title }}
      </router-link>
    </div>
    <p v-else>No quizzes available for this course.</p>
  </div>
</template>
  
  <script>
import axios from "axios";

export default {
  props: ["courseId"],
  data() {
    return {
      quizzes: [],
    };
  },
  async created() {
    await this.fetchQuizzes();
  },
  methods: {
    async fetchQuizzes() {
      try {
        const response = await axios.get(
          `/api/courses/${this.courseId}/quizzes`
        );
        this.quizzes = response.data;
        console.log(this.quizzes);
      } catch (error) {
        console.error("Error fetching quizzes:", error);
      }
    },
    startQuiz(quizId) {
      // Logic to start the quiz, redirect or open quiz in modal, etc.
      console.log("Starting quiz with ID:", quizId);
    },
  },
};
</script>
  
  <style scoped>
/* Add any specific styles for the quiz list here */
</style>
  