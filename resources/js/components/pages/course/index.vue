<template>
    <div>
      <div class="container mt-5">
        <div class="row" v-if="courseDetails">
          <div class="col-md-3">
            <h2 class="text-center mb-4" v-if="courseDetails">
              Course : <br />
              {{ courseDetails.title }}
            </h2>
            <button class="btn btn-primary" @click="enrollInCourse">
              Enroll Now
            </button>
            <!-- Display message here -->
            <p v-if="message">{{ message }}</p>
            <img
              width="100%"
              v-if="courseDetails.image"
              :src="courseDetails.image"
              alt="Course image"
            />
            <p>{{ courseDetails.description }}</p>
            <span>
              <i class="bi bi-person-check"></i>
              {{ courseDetails.instructor.name }}
            </span>
          </div>
          <div class="col-md-6 offset-2">
            <h2>Lessons</h2>
            <ul v-if="lessons.length > 0">
              <li v-for="lesson in lessons" :key="lesson.id">
                <b>{{ lesson.title }}</b>
                <p>{{ lesson.content }}</p>
              </li>
            </ul>
            <p v-else>Searching for lessons.</p>
          </div>
        </div>
        <p v-else>Loading course details...</p>
        
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    props: ["id"],
    data() {
      return {
        courseDetails: null,
        lessons: [],
        message: "", // Define message variable
      };
    },
    created() {
      this.fetchCourseData(this.$route.params.id);
    },
    methods: {
      async fetchCourseData(id) {
        try {
          // Fetch course details
          const courseResponse = await axios.get(`/api/courses/${id}`);
          this.courseDetails = courseResponse.data;
          // Fetch course lessons
          const lessonsResponse = await axios.get(`/api/courses/${id}/lessons`);
          this.lessons = lessonsResponse.data;
        } catch (error) {
          console.error("Error fetching course data:", error);
        }
      },
      async enrollInCourse() {
        try {
          const courseId = this.courseDetails.id;
  
          const response = await axios.post(`/api/courses/${courseId}/enroll`);
  
          // Handle success response
          if (response.status === 201) {
            this.message = "Successfully enrolled in the course!";
          }
        } catch (error) {
          // Handle errors
          if (error.response) {
            // Server responded with a status other than 2xx
            this.message =
              error.response.data.message || "An error occurred during enrollment.";
          } else if (error.request) {
            // Request was made but no response received
            this.message = "No response from the server. Please try again later.";
          } else {
            // Something happened in setting up the request
            this.message = "Error: " + error.message;
          }
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  