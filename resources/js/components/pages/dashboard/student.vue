<template>
  <div>
    <div class="container mt-5">
      <h2 class="text-center mb-4">Courses</h2>
      <div class="mb-4">
        <input
          type="text"
          v-model="searchQuery"
          placeholder="Search courses..."
          class="form-control"
        />
      </div>
      <div id="course-list" class="row" v-if="filteredCourses.length">
        <div
          class="col-md-3 mb-4"
          v-for="course in filteredCourses"
          :key="course.id"
        >
          <div class="card shadow">
            <img
              v-if="course.image"
              :src="course.image"
              class="card-img-top"
              alt="Course image"
            />
            <div class="card-body">
              <h5 class="card-title">{{ course.title }}</h5>
              <p class="card-text" style="font-size: 13px">
                {{ course.description }}
              </p>
              <router-link :to="`/course/${course.id}`" class="btn btn-primary">
                See course
              </router-link>
            </div>
            <span>
              <i class="bi bi-person-check"></i> {{ course.instructor.name }}
              <br /><br />
            </span>
          </div>
        </div>
      </div>
      <div v-else class="text-center w-100">
        <p>Searching for courses...</p>
      </div>
    </div>
  </div>
</template>
  
  <script>
import axios from "axios";

export default {
  data() {
    return {
      courses: [],
      searchQuery: "", // Add search query state
    };
  },
  created() {
    this.getCourses();
  },
  methods: {
    async getCourses() {
      try {
        const response = await axios.get("/api/courses"); // Ensure your API endpoint is correct
        this.courses = response.data;
      } catch (error) {
        console.error("Error fetching courses:", error);
      }
    },
  },
  computed: {
    // Filtered courses based on the search query
    filteredCourses() {
      return this.courses.filter((course) => {
        const titleMatch = course.title
          .toLowerCase()
          .includes(this.searchQuery.toLowerCase());
        const descriptionMatch = course.description
          .toLowerCase()
          .includes(this.searchQuery.toLowerCase());
        return titleMatch || descriptionMatch; // Return true if either matches
      });
    },
  },
};
</script>
  
  <style>
.card {
  transition: transform 0.2s;
}
.card:hover {
  transform: scale(1.05);
}
</style>
  