<template>
  <div>
    <Navbar/>
    <TodayNumbers :display="display"/>
</div>
</template>

<script>
import Navbar from './Navbar';
import TodayNumbers from './TodayNumbers';

  export default {
    data(){
      this.display = {
                    confirmed: 5200,
                    confirmedChange: 22,
                    deaths: 22,
                    deathsChange: 10,
                    tested: 12000,
                    testedChange: 5151,
                    cured: 266,
                    curedChange: 8255
                };
    },
    components : {
            Navbar,
            TodayNumbers
        },

}
</script>

<style>

</style>