<template>
<div>

<Navbar/>

<Carousel/>

<Card/>



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
