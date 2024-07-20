<script setup>
  import {Link} from '@inertiajs/vue3';
  

</script>

<template>

    <nav class=" font-popins bg-semiblack-0 flex-wrap text-white flex justify-between h-20  place-items-center px-20 gap-10">
    <div class="  flex-col text-center">

     <Link href="/"><div class=" text-2xl">
        <a href="">ITECH-ITECHARES </a></div>
     <div class=" text-lg text-red-500">
       <a href=""> since  1969</a>
     </div></Link>

    </div>
    <div class="">
    <ul class="flex  list-none text-center place-items-center  gap-10">
      <Link href="/" class=" link1  text-lg ">Home</Link>
      <Link href="/contact" class="link2 text-lg  ">Contact</Link>

    </ul>
    </div>

    <div class=" space-x-10">
        <Link href="/login" class=" text-red-500 text-lg border-2 border-red-500 shadow-sm p-3 rounded-md
       hover:bg-red-500 hover:text-white duration-500 ease-in-out">Sign Out</Link>
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

