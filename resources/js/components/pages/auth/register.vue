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
        password: ''
      };
    },
    methods: {
      async register() {
        try {
          await axios.post('/api/register', {
            name: this.name,
            email: this.email,
            password: this.password,
          });
          alert('Registration successful');
          this.$router.push('/login');
        } catch (error) {
          alert('Registration failed');
        }
      }
    }
  };
  </script>
  