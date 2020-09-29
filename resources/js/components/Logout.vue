<template>
  <div>
      <Navbar/>
    <div>
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Logging out..</h1>
    </div>
  </div>
</template>

<script>
import Navbar from './Navbar';
export default {
     components : {
            Navbar
    },
    created(){
        this.logout()
    },
    methods: {
        logout() {
            localStorage.removeItem("access_token");
                this.$router.push('/');
        }
    }

}
</script>

<style>

</style>