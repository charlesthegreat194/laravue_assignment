<script setup>
import DashboardHeader from '../Layouts/DashboardHeader.vue';
import CreateNewBtn from '../Components/CreateNewBtn.vue';
import { defineProps, ref } from 'vue';

const props = defineProps({
  users: {
    type: Object,
    required: true,
  },
});

const users = ref(props.users.data);
const updatedUser = ref({ id: null, name: '', email: '' });
const loading = ref(false);
const error = ref(null);

const takeDate = (date) =>
  new Date(date).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  });

const deleteUser = async (userId) => {
  try {
    const response = await fetch(`api/users/${userId}`, {
      method: 'DELETE',
    });
    if (!response.ok) {
      throw new Error('Network response is not ok');
    }
    users.value = users.value.filter(user => user.id !== userId);
  } catch (error) {
    console.error('There was an error deleting the user!', error);
  }
};

const updateUser = (user) => {
  updatedUser.value = { ...user }; // Open edit form with user details
};

const saveUser = async () => {
  try {
    const response = await fetch(`api/users/${updatedUser.value.id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(updatedUser.value),
    });
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    const updatedData = await response.json();
    const index = users.value.findIndex(user => user.id === updatedUser.value.id);

    if (index !== -1) {
      users.value[index] = updatedData;
    }
    updatedUser.value = { id: null, name: '', email: '' }; // Clear the form
  } catch (error) {
    console.error('There was an error updating the user!', error);
  }
};

const closeWindow = () => {
  updatedUser.value = { id: null, name: '', email: '' }; // Clear form on close
};
</script>

<template>
  <DashboardHeader />

  <!-- Flash message -->
  <!-- <div v-if="$page.props.flash.message">
      <p>{{ $page.props.flash.message }}</p>
  </div> -->

  <div class="px-20 mt-5">
    <h1 class="text-gray-300">
      Welcome, <span class="text-red-500">{{ $page.props.auth.user.name }}</span>
    🐐</h1>
  </div>

  <div class="px-20 flex justify-end my-3">
    <CreateNewBtn />
  </div>

  <div class="text-white px-20 h-screen">
    <table class="min-w-full divide-y divide-red-500 shadow-md">
      <thead class="bg-gray-800">
        <tr class="text-center">
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">ID</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Name</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Email</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Date Created</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Action</th>
        </tr>
      </thead>
      <tbody class="bg-gray-700 divide-y divide-gray-600">
        <tr class="text-white text-center" v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ takeDate(user.created_at) }}</td>
          <td class="space-x-12 flex flex-row justify-center items-center p-3">
            <button
              class="p-3 w-12 rounded-md bg-slate-900"
              @click="updateUser(user)"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-cog">
                <circle cx="18" cy="15" r="3" />
                <circle cx="9" cy="7" r="4" />
                <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                <path d="m21.7 16.4-.9-.3" />
                <path d="m15.2 13.9-.9-.3" />
                <path d="m16.6 18.7.3-.9" />
                <path d="m19.1 12.2.3-.9" />
                <path d="m19.6 18.7-.4-1" />
                <path d="m16.8 12.3-.4-1" />
                <path d="m14.3 16.6 1-.4" />
                <path d="m20.7 13.8 1-.4" />
              </svg>
            </button>

            <button
              class="p-3 w-12 rounded-md bg-red-600"
              @click="deleteUser(user.id)"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                <path d="M3 6h18" />
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="editForm w-96 mx-auto">
    <div v-if="updatedUser.id" class="text-white flex justify-center px-20 mt-10">
      <form @submit.prevent="saveUser" class="bg-gray-800 border border-gray-700 rounded-lg p-6 w-80">
        <div class="flex justify-end">
          <v-btn class="max-w-4" color="danger" @click="closeWindow">X</v-btn>
        </div>
        <h1 class="text-2xl font-semibold text-center mb-4 text-red-500">Edit User</h1>
        <div class="mb-4">
          <label for="name" class="block text-gray-400 mb-1">Name</label>
          <input
            v-model="updatedUser.name"
            type="text"
            id="name"
            name="name"
            class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Name"
          />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-400 mb-1">Email</label>
          <input
            v-model="updatedUser.email"
            type="email"
            id="email"
            name="email"
            class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Email"
          />
        </div>
        <button
          type="submit"
          class="w-full py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-600"
        >
          Save
        </button>
      </form>
    </div>
  </div>
</template>

<style>
  body {
    background-color: #060606;
  }
  .editForm {
    width: 500px;
  }
</style>
