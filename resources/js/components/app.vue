<template>
  <div>
    <div id="banner-top">
      <span style="padding: 5px">Welcome to e-learning hi plateform.</span>
    </div>

    <div class="">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="/public/e5.png" alt="" width="60px" />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <router-link active-class="active-bold" class="nav-link" to="/"
                  ><i class="bi bi-house-door-fill"></i> Home</router-link
                >
              </li>           
            </ul>

            <ul class="navbar-nav ms-auto">
              <li class="nav-item" v-if="!isAuthenticated">
                <router-link
                  active-class="active-bold"
                  class="nav-link"
                  to="/login"
                  >Login</router-link
                >
              </li>
              <li class="nav-item" v-if="!isAuthenticated">
                <router-link
                  active-class="active-bold"
                  class="nav-link"
                  to="/register"
                  >Register</router-link
                >
              </li>
              <li class="nav-item" v-if="isAuthenticated">
                <router-link
                  active-class="active-bold"
                  class="nav-link"
                  to="/profile"
                  ><i class="bi bi-person-circle"></i> {{ user.name }}</router-link
                >
              </li>
              <li class="nav-item" v-if="isAuthenticated">
                <button class="nav-link" @click="logout">Logout</button>
              </li>
            </ul>

          </div>
        </div>
      </nav>

      <router-view />
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  computed: {
    ...mapGetters(["isAuthenticated", "getUser"]),
    user() {
      return this.getUser;
    },
  },
  methods: {
    ...mapActions(["clearUser"]),
    async logout() {
      try {
        await axios.post("/api/logout");
        this.clearUser(); // Clear user from Vuex
        //alert('Logged out successfully');
        this.$router.push("/login");
      } catch (error) {
        alert("Error logging out");
      }
    },
  },
};
</script>

<style>
.nav-link.active-bold {
  color: teal;
}
#banner-top {
  color: white;
  background-color: teal;
  text-align: center;
}
#banner-top:hover {
  font-weight: bold;
}
</style>