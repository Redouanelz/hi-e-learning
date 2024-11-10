<template>
    <div class="container">
      <h2>Quiz: {{ quiz.title }}</h2>
      <div class="row">
        <div class="col-md-6 offset-3">
          <div v-if="questions.length > 0">
            <div
              v-for="(question, index) in questions"
              :key="question.id"
              class="question"
            >
              <p>{{ index + 1 }}. {{ question.question_text }}</p>
              <span :class="getAnswerClass(index, question.answer_one)">
                {{ question.answer_one }}
              </span>
              or
              <span :class="getAnswerClass(index, question.answer_two)">
                {{ question.answer_two }}
              </span>
              or
              <span :class="getAnswerClass(index, question.answer_three)">
                {{ question.answer_three }}
              </span>
  
              <input
                class="form-control mt-2"
                type="text"
                v-model="userAnswers[index]"
                :class="getInputClass(index)"
                placeholder="Your answer"
              />
            </div>
  
            <button @click="checkAnswers" class="btn btn-primary mt-3">
              Submit Answers
            </button>
            <br /><br />
            <div v-if="feedback">
              <p>{{ feedback }}</p>
            </div>
          </div>
          <p v-else>Loading questions, no question found...</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        quiz: {},
        questions: [],
        userAnswers: [],
        feedback: "",
        answerStatuses: [], // Track the status of each answer
      };
    },
    async created() {
      await this.fetchQuizData();
    },
    methods: {
      async fetchQuizData() {
        try {
          const quizId = this.$route.params.id;
          const response = await axios.get(`/api/quizzes/${quizId}`);
          this.quiz = response.data;
          this.questions = response.data.questions;
          this.userAnswers = new Array(this.questions.length).fill("");
          this.answerStatuses = new Array(this.questions.length).fill(null); // Initialize statuses
        } catch (error) {
          console.error("Error fetching quiz data:", error);
        }
      },
      checkAnswers() {
        let correctCount = 0;
        this.questions.forEach((question, index) => {
          const isCorrect =
            this.userAnswers[index].trim().toLowerCase() ===
            question.correct_answer.trim().toLowerCase();
          this.answerStatuses[index] = isCorrect ? "correct" : "incorrect";
          if (isCorrect) correctCount++;
        });
        this.feedback = `You answered ${correctCount} out of ${this.questions.length} questions correctly.`;
      },
      getAnswerClass(index, answer) {
        // Highlight the correct answer when the answer is checked
        return this.answerStatuses[index] === "incorrect" &&
          answer.trim().toLowerCase() ===
            this.questions[index].correct_answer.trim().toLowerCase()
          ? "highlight-correct"
          : "";
      },
      getInputClass(index) {
        // Change input background color based on correctness
        return this.answerStatuses[index] === "correct"
          ? "correct-answer"
          : this.answerStatuses[index] === "incorrect"
          ? "incorrect-answer"
          : "";
      },
    },
  };
  </script>
  
  <style scoped>
  .question {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  
  .correct-answer {
    background-color: #d4edda !important; /* Light green */
    transition: background-color 0.3s ease;
  }
  
  .incorrect-answer {
    background-color: #f8d7da !important; /* Light red */
    transition: background-color 0.3s ease;
  }
  
  .highlight-correct {
    color: #28a745; /* Green text color for correct answers */
    font-weight: bold;
  }
  </style>
  