<template>
  <div>
    <div class="container mt-5">
      <div class="row" v-if="courseDetails">
        <div class="col-md-3">
          <h2 class="text-center mb-4" v-if="courseDetails">
            Course : <br />
            {{ courseDetails.title }}
          </h2>
          <button
            class="btn btn-primary"
            v-if="!isEnrolled"
            @click="enrollInCourse"
          >
            Enroll Now
          </button>
          <button
            class="btn btn-danger"
            v-if="isEnrolled"
            @click="removeEnrollment"
          >
            Remove Enrollment
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
        <div class="col-md-7 offset-1">
          <div class="lessons-container">
            <h2>Lessons</h2>
            <ul v-if="lessons.length > 0">
              <li v-for="lesson in lessons" :key="lesson.id">
                <hr />
                <b>Lesson : {{ lesson.title }}</b>
                <p v-html="lesson.content"></p>
                <!-- Render HTML content here -->
              </li>
            </ul>

            <p v-else>Searching for lessons, no lessons found.</p>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button class="btn btn-primary m-4">Start Quiz</button>
            </div>
          </div>
        </div>
      </div>
      <p v-else>Loading course details, no course found...</p>
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
      isEnrolled: false, // Track enrollment status
    };
  },
  created() {
    this.fetchCourseData(this.$route.params.id);
    this.checkEnrollmentStatus();
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
          this.checkEnrollmentStatus();
        }
      } catch (error) {
        // Handle errors
        if (error.response) {
          // Server responded with a status other than 2xx
          this.message =
            error.response.data.message ||
            "An error occurred during enrollment.";
        } else if (error.request) {
          // Request was made but no response received
          this.message = "No response from the server. Please try again later.";
        } else {
          // Something happened in setting up the request
          this.message = "Error: " + error.message;
        }
      }
    },

    async checkEnrollmentStatus() {
      try {
        const courseId = this.$route.params.id;
        const response = await axios.get(
          `/api/courses/${courseId}/is-enrolled`
        );
        this.isEnrolled = response.data.isEnrolled;
        console.log(this.isEnrolled);
      } catch (error) {
        console.error("Error checking enrollment status:", error);
      }
    },

    async removeEnrollment() {
      try {
        const courseId = this.courseDetails.id;
        const response = await axios.delete(
          `/api/courses/${courseId}/unenroll`
        );
        if (response.status === 200) {
          this.message = "Enrollment removed successfully.";
          this.isEnrolled = false;
        }
      } catch (error) {
        this.message =
          error.response?.data?.message ||
          "An error occurred while removing enrollment.";
      }
    },
  },
};
</script>
  
  <style scoped>
/* Add your styles here */
.lessons-container {
  max-height: 500px; /* Set the maximum height you want for the scrollable area */
  overflow-y: auto; /* Enable vertical scrolling */
  padding-right: 10px; /* Add some padding for better alignment */
}
</style>
  