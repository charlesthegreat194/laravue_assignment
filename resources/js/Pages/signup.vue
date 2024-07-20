<script setup>
import Header from '../Layouts/Header.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post('/register', {
        onError: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Header></Header>

    <div class="space-x-20 flex flex-row px-20 items-center justify-center mt-10">
        <div class="font-anton">
            <!-- for slogan -->
            <h1 class="text-white text-6xl font-anton font-bold">
                Sign Up <span class="text-red-500 text-6xl">Now!</span>
            </h1>
        </div>

        <div>
            <form @submit.prevent="submit">
              
                <div class="bg-white p-8 flex flex-col justify-center items-center rounded-lg shadow-lg w-96">
                    <h2 class="text-center text-2xl font-semibold text-red-500 mb-4">Sign Up</h2>

                    <div class="w-full mb-4">
                        
                        <v-text-field
                            name="fullname"
                            label="Fullname"
                            id="id"
                            type="text"
                            v-model="form.name"
                            required
                        ></v-text-field>
                      
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div class="w-full mb-4">

                        <v-text-field
                            name="email"
                            label="Email"
                            id="id"
                            type="email"
                            v-model="form.email"
                        ></v-text-field>
                     
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div class="w-full mb-4">

                        <v-text-field
                            name="password"
                            label="Password"
                            id="id"
                            type="password"
                            v-model="form.password"
                        ></v-text-field>
                     
                        <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
                    </div>

                    <div class="w-full mb-4">

                        <v-text-field
                            name="confirmapassword"
                            label="Confirm Password"
                            id="id"
                            type="password"
                            v-model="form.password_confirmation"
                        ></v-text-field>
                   
                        <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">{{ form.errors.password_confirmation }}</p>
                    </div>

                    <button
                        type="submit"
                        class="mt-4 bg-red-500 w-full h-12 p-3 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        Sign  Up
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
    body{
        background-color: #060606;
    }
</style>