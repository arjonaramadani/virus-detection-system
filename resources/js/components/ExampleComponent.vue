<template>
<div>

<Navbar/>
<div class="container p-5">
     <b-card title="Mirë se vini" body-class="text-center">

    <b-card-text>
      Kjo faqe përmban informatat më të fundit mbi përhapjen e virusit COVID-19, duke mbledhur të dhëna nga faqja e WHO (Organizata Botërore e Shëndetësisë), si dhe nga autoritetet Kosovare shëndetësore në nivel qendror dhe lokal.
    </b-card-text>

    <b-button variant="primary">
        <router-link to="/register" class="text-white text-decoration-none">
        Regjistrohu si mjek
        </router-link>
        </b-button>
  </b-card>
</div>

<div class="container p-5">
    <b-card-group deck>
      <b-card header="Raste të konfirmuara" class="text-center">
        <b-card-text>5237</b-card-text>
      </b-card>

     <b-card header="Raste të shëruara" class="text-center">
        <b-card-text>2462</b-card-text>
      </b-card>

      <b-card header="Vdekje" class="text-center">
        <b-card-text>112</b-card-text>
      </b-card>
    </b-card-group>
</div>

<div class="container p-5">
    <b-card-group deck>
      <b-card
        border-variant="primary"
        header="Simptomat"
        header-bg-variant="primary"
        header-text-variant="white"
        align="center"
      >
        <b-card-text>Simptomat më të zakonshme të Koronavirusit janë ethet, lodhja dhe kolla e thatë. Disa pacientë mund të kenë edhe dhimbje fyti, zënie të hundës, rrjedhje hundësh ose barkqitje.

</b-card-text>
      </b-card>
    </b-card-group>
</div>

<!-- <Carousel/> -->

<!-- <Card/> -->



</div>
</template>

<script>
import Navbar from './Navbar';
import Carousel from './Carousel';
import Card from './Card';

    export default {
      components : {
            Navbar,
            Carousel,
            Card
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
