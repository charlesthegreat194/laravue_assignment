<script setup>
  import {Link} from '@inertiajs/vue3';  

</script>

<template>

    <nav class=" font-popins bg-semiblack-0 flex-wrap text-white flex justify-between h-20  place-items-center px-20 gap-10">
    <div class="  flex-col text-center">
     <div class=" text-2xl">
        <a href="">ITECH-ITECHARES </a></div>
     <div class=" text-lg text-red-500">
       <a href=""> since  1969</a>
     </div>
    </div>
    <div class="">
    <ul class="flex  list-none text-center place-items-center  gap-10">
      <Link href="/" class="link1 active: text-red-500">Home</Link>
      <Link href="/contact" class="link2">Contact</Link>
      
    </ul>
    </div>
      
    <div>
        <a href="" class=" text-red-500" @click="whenClicked">Sign In</a>
    </div>
  </nav>
    
</template>

<script>
export default {
  methods:{
    whenClicked(){
      alert('Couldnt proceed. Try again later.');
    }
  }
}
</script>

