<template>
    <div>
        <div class="col-md-4 offset-4">
            <h2>Login</h2>
            <form @submit.prevent="login">
                Email
                <input class="form-control" v-model="email" type="email" placeholder="Email" required />
                Password
                <input class="form-control" v-model="password" type="password" placeholder="Password" required />
                <br><button class="btn btn-outline-success" type="submit">Login</button>
            </form>
        </div>
    </div>
  </template>
  
  <script>

  export default {
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      async login() {
        try {
          const response = await axios.post('/api/login', {
            email: this.email,
            password: this.password,
          });
          alert('Login successful');
          this.$router.push('/dashboard');
        } catch (error) {
          alert('Invalid credentials');
        }
      }
    }
  };
  </script>
  