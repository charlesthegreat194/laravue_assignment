<script setup>
import Header from '../Layouts/Header.vue';
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Footer from '../Layouts/Footer.vue';

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
    <Header />

    <div class="space-x-20 flex flex-row px-20 items-center justify-center mt-10">
        <div class="font-anton">
            <!-- Slogan -->
            <h1 class="text-white text-6xl font-anton font-bold shadow-md">
                Sign Up <span class="text-red-500 text-6xl shadow-md">Now!</span>
            </h1>
            <h1 class="text-red-500 text-6xl font-anton font-bold shadow-md">
                Sign Up <span class="text-white text-6xl shadow-md">Now!</span>
            </h1>
            <h1 class="text-white text-6xl font-anton font-bold shadow-md">
                Sign Up <span class="text-red-500 text-6xl shadow-md">Now!</span>
            </h1>
        </div>

        <div>
            <form @submit.prevent="submit">
                <div class="signupform bg-gray-200 p-8 flex flex-col justify-center items-center rounded-lg shadow-lg">
                    <h2 class="text-center text-2xl font-semibold text-red-500 my-4">Sign Up</h2>

                    <div class="w-full mb-4">
                        <v-text-field
                            name="fullname"
                            label="Fullname"
                            id="fullname"
                            type="text"
                            v-model="form.name"
                            required
                            class="nameInput"
                        />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div class="w-full mb-4">
                        <v-text-field
                            name="email"
                            label="Email"
                            id="email"
                            type="email"
                            v-model="form.email"
                            required
                            class="emailInput"
                        />
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div class="w-full mb-4">
                        <v-text-field
                            name="password"
                            label="Password"
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            class="passwordInput"
                        />
                        <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
                    </div>

                    <div class="w-full mb-2">
                        <v-text-field
                            name="password_confirmation"
                            label="Confirm Password"
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                            class="passwordInput"
                        />
                        <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">
                            {{ form.errors.password_confirmation }}
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="mt-1 bg-red-500 w-full h-12 p-3 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        Sign Up
                    </button>

                    <div class="my-3 text-center">
                        <p>
                            Already have an account? 
                            <Link href="/login" class="font-semibold text-red-500 hover:underline">Sign In!</Link>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <Footer />
</template>

<style>
    body {
        background-color: #060606;
    }

    .signupform {
        height: 550px;
        width: 400px;
    }
</style>
