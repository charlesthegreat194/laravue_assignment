<script setup>
import Header from '../Layouts/Header.vue';
import { useForm } from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3';
import Footer from '../Layouts/Footer.vue';

const form = useForm({
    email: null,
    password: null,
});

const submit = () => {
    form.post('/login', {
        onError: () => form.reset('password'),
    });
};
</script>

<template>
    <Header></Header>

    <div class="flex h-screen flex-col justify-center items-center px-20  ">
        <form @submit.prevent="submit">
            <div class="loginform bg-slate-900 p-8 rounded-lg shadow-lg ">
                <h2 class="text-center text-2xl tracking-wider font-semibold text-red-500 mb-6">Sign In</h2>

                <div class="mb-4">
                    <v-text-field 
                        name="Email"
                        label="Email"
                        id="id"
                        type="email"
                        v-model="form.email"
                        required
                        class="emailinput"  
                        
                    ></v-text-field>

                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                </div>

                <div class="mb-6">

                    <v-text-field 
                        name="password"
                        label="Password"
                        id="id"
                        type="password"
                        v-model="form.password"
                        required
                        hint=" At least 10 characters with symbols "
                        class= "passwordhint"

                    ></v-text-field>

                    <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
                </div>

                <button
                    type="submit"
                    class="w-full h-12 bg-red-500  text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                >
                    Log In
                </button>
                <div class=" my-3 text-center">
                    <p class=" text-gray-300">Don't have an account? <Link href="/signup" class=" text-red-500 font-semibold hover:underline"> Sign Up!</Link></p>
                </div>
            </div>
        </form>
    </div>

    <Footer></Footer>

</template>

<style>
    body{
        background-color: #060606;
    }
    .loginform{
        width: 400px;
    }
    .passwordhint, .emailinput{
        text-align: center;
        color: #ef4444;
        font-weight: bolder;
        font-size: 32px;
    }
  
</style>