<template>
    <div>
      <div class="container mt-5">
        <h2 class="text-center mb-4">My Enrolled Courses</h2>
        <div class="row" v-if="enrollments.length > 0">
          <div class="col-md-2" v-for="enrollment in enrollments" :key="enrollment.id">
            <h3>{{ enrollment.course.title }}</h3>
            <img
              width="100%"
              v-if="enrollment.course.image"
              :src="enrollment.course.image"
              alt="Course image"
            />
            <router-link :to="`/course/${enrollment.course.id}`" class="btn btn-primary">
              See course
            </router-link>
            <button class="btn btn-danger mt-2" @click="removeEnrollment(enrollment.course.id)">
              Remove Enrollment
            </button>
          </div>
        </div>
        <p v-else>You are not enrolled in any courses yet.</p>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        enrollments: [],
      };
    },
    async created() {
      await this.fetchUserEnrollments();
    },
    methods: {
      async fetchUserEnrollments() {
        try {
          const response = await axios.get("/api/student/enrollments");
          this.enrollments = response.data;
        } catch (error) {
          console.error("Error fetching enrollments:", error);
        }
      },
      async removeEnrollment(courseId) {
        try {
          await axios.delete(`/api/student/enrollments/${courseId}`);
          // Remove the unenrolled course from the local state
          this.enrollments = this.enrollments.filter(
            enrollment => enrollment.course.id !== courseId
          );
        } catch (error) {
          console.error("Error removing enrollment:", error);
        }
      },
    },
  };
  </script>
  