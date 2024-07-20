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

    <div class="space-x-20 flex flex-row px-20 items-center justify-center mt-20">
        <div class="font-anton">
            <!-- for slogan -->
            <h1 class="text-white text-6xl">
                Register <span class="text-red-500 text-6xl">Now!</span>
            </h1>
        </div>

        <div>
            <form @submit.prevent="submit">
              
                <div class="bg-white p-8 flex flex-col justify-center items-center rounded-lg shadow-lg w-96">
                    <h2 class="text-center text-2xl font-semibold text-red-500 mb-4">Sign Up</h2>

                    <div class="w-full mb-4">
                        <label for="name" class="block text-gray-700 mb-2">Name</label>
                        <input
                            type="text"
                            id="name"
                            v-model="form.name"
                            required
                            class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                        />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div class="w-full mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input
                            type="email"
                            id="email"
                            v-model="form.email"
                            required
                            class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                        />
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div class="w-full mb-4">
                        <label for="password" class="block text-gray-700 mb-2">Password</label>
                        <input
                            type="password"
                            id="password"
                            v-model="form.password"
                            required
                            class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                        />
                        <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
                    </div>

                    <div class="w-full mb-4">
                        <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            required
                            class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                        />
                        <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">{{ form.errors.password_confirmation }}</p>
                    </div>

                    <button
                        type="submit"
                        class="mt-4 bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
