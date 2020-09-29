<template>
 <div>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="#">VDS</b-navbar-brand>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item>
          <router-link to="/" class="text-white text-decoration-none">
            HOME
          </router-link>
        </b-nav-item>
        <b-nav-item>
          <router-link to="/survey" class="text-white text-decoration-none">
          PYETESORI
          </router-link>
        </b-nav-item>
        <b-nav-item>
          <router-link to="/about-us" class="text-white text-decoration-none">
          RRETH NESH
          </router-link>
        </b-nav-item>   
        <b-nav-item v-if="isLoggedIn">
          <router-link to="/dashboard" class="text-white text-decoration-none">
          DASHBOARD
          </router-link>
        </b-nav-item>       
      </b-navbar-nav>

      <b-navbar-nav class="ml-auto">
        <b-nav-item v-if="!isLoggedIn">
        <router-link to="/login" class="text-white text-decoration-none">
        LOGIN
        </router-link>
        </b-nav-item>      
        <b-nav-item-dropdown right v-else>
          <template v-slot:button-content>
            <em>User</em>
          </template>
          <!-- <b-dropdown-item href="#">Profile</b-dropdown-item> -->
          <b-dropdown-item class="text-decoration-none"><router-link to="/logout">Sign Out</router-link></b-dropdown-item>
        </b-nav-item-dropdown>

      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>
<script>
export default {
   data() {
    return {
      isLoggedIn: false,
    }
  },
  created() {
        this.checkLoggedIn()
    },
    methods : {
        checkLoggedIn() {
            if(localStorage.getItem("access_token"))
            {
                this.isLoggedIn = true;
            }else{
                this.isLoggedIn = false;
            }
        },
    }
}
</script>