<template>
    <div>
     
        <div class="col-md-4 offset-4 ">
            <h2 class="text-2xl">Register</h2>
            <form @submit.prevent="register">
                Full name
                <input class="form-control"  v-model="name" type="text" placeholder="Name" required />
                Email
                <input class="form-control" v-model="email" type="email" placeholder="Email" required />
                Password
                <input class="form-control" v-model="password" type="password" placeholder="Password" required />
                <div class="mt-3">
                  <label>Role:</label><br />
                  <input checked type="radio" id="student" value="student" v-model="role" required />
                  <label for="student"> Student</label>
                  <br>
                  <input type="radio" id="instructor" value="instructor" v-model="role" required class="ml-2" />
                  <label for="instructor">  Instructor</label>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Register</button>
            </form>
        </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        role: null, // Initially set to null
      };
    },
    methods: {
      async register() {
        try {
          await axios.post('/api/register', {
            name: this.name,
            email: this.email,
            password: this.password,
            role: this.role,
          });
          //alert('Registration successful');
          this.$router.push('/login');
        } catch (error) {
          alert('Registration failed');
        }
      }
    }
  };
  </script>
  