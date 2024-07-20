<script setup>
import Header from '../Layouts/Header.vue';
import { useForm } from '@inertiajs/vue3';

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

    <div class="flex flex-col justify-center items-center px-20 mt-20">
        <form @submit.prevent="submit">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <h2 class="text-center text-2xl font-semibold text-red-500 mb-6">Sign In</h2>

                <div class="mb-4">
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

                <div class="mb-6">
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

                <button
                    type="submit"
                    class="w-full bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                >
                    Log In
                </button>
            </div>
        </form>

       
    </div>
</template>
