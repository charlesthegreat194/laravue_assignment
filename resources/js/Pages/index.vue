<script setup>
    
import Header from '../Layouts/Header.vue';
import Main from '../Layouts/Main.vue';
import Footer from '../Layouts/Footer.vue';
import {Head} from "@inertiajs/vue3";

window.addEventListener('resize', ()=>{
    alert('sorry, mobile view is unavailable!');
})



</script>

<template>
  <Head>
<title>Home</title>
  </Head>
  <!-- header -->
   <Header />

 <Main>
  <!-- main -->
   </Main>

   <Footer>
  <!--shows my footer -->
    </Footer>

</template>



<style>
    body{
        background-color: #060606;
    }
</style>
