<script setup>
    import Header from  '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';
    import {Link, Head} from "@inertiajs/vue3";

    window.addEventListener('resize', ()=>{
        alert('sorry, mobile view is unavailable!');
    })

</script>
<template>

<Head><title>Contact</title></Head>


        <!-- some header -->
         <nav class=" font-popins bg-semiblack-0  text-white flex justify-between h-20  place-items-center px-20 gap-10">
    <div class="  flex-col text-center">
     <div class=" text-2xl">
        <a href="">ITECH-ITECHARES </a></div>
     <div class=" text-lg text-red-500">
       <a href=""> since  1969</a>
     </div>
    </div>
    <div class="">
    <ul class="flex  list-none text-center place-items-center  gap-10">
      <Link href="/" class=" ">Home</Link>
      <Link href="/contact" class=" active: text-red-500">Contact</Link>
      
    </ul>
    </div>
      
    <div>
        <a href="" class=" text-red-500" @click="whenClicked">Sign In</a>
    </div>
  </nav>

        <!-- BODY -->
    
    <div class=" flex flex-row mt-36 px-36 place-items-center justify-center  font-popins space-x-20 pb-20">
        <!-- W slogan -->
        <div class=" flex flex-col">
            <h1 class=" font-anton text-5xl tracking-wider font-bold text-white pb-14">REACH OUT<br> TO 
             <span class=" text-red-500"> US</span></h1>
      
        <h3 class=" tracking-wide text-white text-lg font-semibold pt-3 pb-2">Contact Info</h3>
        <p class=" text-gray-300 text-sm">Office Hours: Monday-Friday 09:00AM to 05:00PM</p>
        <p class=" text-gray-300 text-sm">Tanibag Street, Mabini III 2nd , OTA 69</p>
        <p class=" text-gray-300 text-sm">6069, Philippines</p>
     
        </div>
           
            <!-- contact form -->
         
        <div>
                <form action="post">
                         <div class=" flex flex-col text-white pb-3">
                            <label for="name" class=" text-sm text-gray-300 pb-1">Your Name</label>
                            <input type="text" class=" text-black rounded-md focus: border-black dark:focus:border-slate-900 focus:ring-semiblack-0 dark:focus:ring-semiblack-0 
                              placeholder: text-sm" placeholder="Your Name" required>
                         </div>
                         <div class=" flex flex-col text-white pb-3">
                            <label for="email" class=" text-sm text-gray-300 pb-1">Your Email</label>
                            <input type="email" class=" text-black rounded-md placeholder: text-sm focus: border-black dark:focus:border-slate-900 focus:ring-semiblack-0 dark:focus:ring-semiblack-0 " placeholder="Your Email" required>
                         </div>

                         <div class=" flex flex-col text-white pb-2">
                            <label for="message" class=" text-sm text-gray-300 pb-1">Message:</label>
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Say something" 
                            class=" placeholder: text-sm rounded-md text-black h-32 mb-3 focus: border-black dark:focus:border-slate-900 focus:ring-semiblack-0 dark:focus:ring-semiblack-0 "></textarea>
                         </div>

                         <button class=" text-white p-2  rounded-md  text-lg w-72 bg-red-500">Submit</button>
                     </form>
                 </div>
    </div>








    <Footer>
    <!-- footer -->
    </Footer>
</template>

<style>
    body{
        background-color: #060606;
    }
</style>
<script>
export default {
    methods: {
        whenClicked(){
            alert('Couldnt proceed. Try again later.');
        }
    },
}
</script>