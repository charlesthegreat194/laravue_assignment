<script setup>
import TextInput from '../Components/TextInput.vue';



</script>


<template>
    <div class=" banner max-h-screen px-20 m-20 p-0 gap-10 space-x-10 flex flex-row justify-center place-items-center  ">
        <div class="  text-center flex flex-col justify-center place-items-center">
            <!-- word -->
            <h1 class=" text-5xl font-anton font-bold text-white tracking-wide">THEY CHANGED <br>
            THE WORLD.</h1>
            <span class=" text-5xl font-anton font-bold text-red-500 tracking-wide"> NOW YOU.</span>

            <p class=" text-white text-center p-3 ">Learn from the most inspiring programmers,<br> leaders,  and become the next 
                legend.
            </p>

                <form action="">
                    <div class=" space-y-3 text-center">
                        <TextInput/>
               
                <button class="  text-center block p-3 shadow-md rounded-sm hover:bg-red-600 ease-in-out duration-500 bg-red-500 w-72 text-white
             ">Sign Up</button>
                    </div>
            </form>

            <p class=" text-white text-center p-3">Get our offer now or you'll miss this <br> wonderful 
            opportunity to become the GOAT.</p>

            <p class="text-gray-300 text-xs font-thin text-center p-1">By sharing your email, you agree to our <br>
            <a href="" class=" underline">Terms of Service</a> and <a href="" class=" underline">Private Policy</a></p>


            
        </div>
        <div class=" yawa bg-red-500 rounded-full w-72 h-72 mb-20 ">
           
           <img src="images/pm.png" alt="" class="unskew">

        </div>
    </div>

    <!--  service info -->
    <div id="" class=" max-h-100 font-popins px-20 mt-36 flex place-items-center space-x-5">

        <div id="info" class=" text-white text-center">
            <!-- service descrip -->
            <h1 class="info-title text-red-500 text-3xl tracking-wider  p-3 ">SERVICE INFORMATION</h1>
            <h5 class=" p-3 text-lg">Welcome to <span class=" text-red-500">ITECH-ITECHARES</span>, where innovation meets excellence. We are
                a premier software company dedicated to delivering top-notch solutions in web
                development, mobile development, and project management.
            </h5>
        </div>
    </div>

          <!-- service offers -->
        <div class=" px-20 my-10 flex flex-row p-6 justify-center place-items-center space-x-10">

            <div class="card p-6 bg-slate-900 border border-semiblack-0 flex flex-col justify-center place-items-center rounded-md shadow-md hover:bg-slate-800 ease-in-out duration-500"
                    @click="getClicked">
                <!-- 1st card --> 
                <img src="images/web.png" class=" w-24" alt="webdevpic">
                <h3 class=" text-red-500 p-2 font-semibold text-lg">Web Development</h3>
                <p class="   text-gray-300 text-center">We create stunning, responsive webs tailored to meet your business needs.</p>

            </div>

            <div class="card p-6 bg-slate-900 border border-semiblack-0 flex flex-col justify-center place-items-center rounded-md shadow-md hover:bg-slate-800 ease-in-out duration-500"
                            @click="getClicked">
                <!-- 2nd card -->
                <img src="images/appdev1.png" class=" w-24" alt="appdevpic">
                <h3 class=" text-red-500 p-2 font-semibold text-lg">App Development</h3>
                <p class=" text-gray-300 text-center">We engineer amazing, expensive apps tailored to meet your business needs.</p>

            </div>

            <div class="card p-6 bg-slate-900 border border-semiblack-0 flex flex-col justify-center place-items-center rounded-md shadow-md hover:bg-slate-800 ease-in-out duration-500 "
                                @click="getClicked">
                <!-- 3rd card -->
                <img src="images/projman.png" class="w-24" alt="pmpic">
                <h3 class=" text-red-500 p-2 font-semibold text-lg">Project Management</h3>
                <p class=" text-gray-300 text-center">We ensure your projects are completed on time and within budget.</p>
            </div>

           

        </div> 
         <div class=" pt-36 flex flex-col justify-center place-items-center font-popins">
                <h1 class=" text-white text-lg p-4">
                    Ready to join? Enter your email to apply and join our team!
                </h1>

                <div class="flex flex-row space-x-3 justify-center place-items-center">
                    <input type="text" class=" p-3 w-80 bg-slate-900 text-gray-300 rounded-sm focus: border-black dark:focus:border-slate-900 focus:ring-semiblack-0 dark:focus:ring-semiblack-0 shadow-sm" placeholder="Email address">
                    <button class=" p-3 w-40 bg-red-500 font-semibold text-white  rounded-sm  hover:bg-red-600 ease-in-out duration-500">Get Started ></button>
                </div>
            </div>
</template>

<script>
export default {
    methods: {
        getClicked(){
            alert('SERVICE UNAVAILABLE')
        }
    }
}
</script>


<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
</style>
<style scoped>
    .yawa{
        width: 500px;
        height: 400px; 
        border-radius: 100%/80%; 
        transform: skew(-10deg, -10deg);
    }
    .unskew{
        
        transform: skew(10deg,  5deg);
    }
    .card{
        width: 500px;
        cursor: pointer;
    }
</style>
