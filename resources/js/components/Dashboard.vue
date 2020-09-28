<template>
  <div>
    <div class="wrapper">
      <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
        <div>
          <!-- <b-button v-b-toggle.sidebar-1>Toggle Sidebar</b-button> -->
          <b-sidebar id="sidebar-1" v-b-toggle title="Sidebar" shadow>
            <div class="px-3 py-2">
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo
                odio, dapibus ac facilisis in, egestas eget quam. Morbi leo
                risus, porta ac consectetur ac, vestibulum at eros.
              </p>
              <b-img
                src="https://picsum.photos/500/500/?image=54"
                fluid
                thumbnail
              ></b-img>
            </div>
          </b-sidebar>
        </div>
      </div>
    </div>
  </div>
</template>
  

<script>
export default {};
</script>

<style scoped>
div#sidebar-1 {
  display: block !important;
}
</style>