<template>
  <div>
    <div class="col-md-4 offset-4">
      <h2 class="text-2xl">Login</h2>
      <form @submit.prevent="login">
        Email
        <input
          class="form-control"
          v-model="email"
          type="email"
          placeholder="Email"
          required
        />
        Password
        <input
          class="form-control"
          v-model="password"
          type="password"
          placeholder="Password"
          required
        />
        <br /><button class="btn btn-primary" type="submit">Login</button>
      </form>
    </div>
  </div>
</template>
  
  <script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    ...mapActions(["setUser"]),
    async login() {
      try {
        const response = await axios.post("/api/login", {
          email: this.email,
          password: this.password,
        });

        this.setUser(response.data.user); // Save the user in Vuex
        // Redirect based on the user's role
        if (response.data.user.role === "instructor") {
          this.$router.push("/instructor/dashboard");
        } else if (response.data.user.role === "student") {
          this.$router.push("/student/dashboard");
        }
      } catch (error) {
        alert("Invalid credentials");
      }
    },
  },
};
</script>
  