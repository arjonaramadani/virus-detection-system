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
        <router-link to="/covid" class="text-white text-decoration-none">
        COVID-19
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
        <!-- <b-nav-item href="#" disabled>Disabled</b-nav-item> -->
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <!-- <b-nav-form>
          <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
          <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
        </b-nav-form> -->

        <!-- <b-nav-item-dropdown text="Lang" right> -->
          <!-- <b-dropdown-item href="#">EN</b-dropdown-item> -->
          <!-- <b-dropdown-item href="#">SQ</b-dropdown-item> -->
        <!-- </b-nav-item-dropdown> -->

        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template v-slot:button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>