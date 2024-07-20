<script setup>
import DashboardHeader from "../Layouts/DashboardHeader.vue";
import { defineProps, ref } from "vue";
import axios from "axios";

const props = defineProps({
  users: {
    type: Array,
    required: true,
  },
});


const users = ref(props.users);
const updatedUser = ref({ id: null, name: '', email: '' });
const loading = ref(false);
const  error = ref(null);

const takeDate = (date) =>
  new Date(date).toLocaleDateString("en-us", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });

const deleteUser = async (userId) => {
 
    try {
      await axios.delete(`api/users/${userId}`);
      users.value = users.value.filter(user => user.id !== userId);
    } catch (error) {
      console.error("There was an error deleting the user!", error);
    }
  
};


const updateUser = (user) => {
  updatedUser.value = { ...user }; // Open edit form with user details
};

const saveUser = async () => {
  try {
    await axios.put(`api/users/${updatedUser.value.id}`, updatedUser.value);
    const index = users.value.findIndex(user => user.id === updatedUser.value.id);
    if (index !== -1) {
      users.value[index] = updatedUser.value;
    }
    updatedUser.value = { id: null, name: '', email: '' }; // Clear the form
  } catch (error) {
    console.error("There was an error updating the user!", error);
  }
};


</script>

<template>
  <DashboardHeader></DashboardHeader>
  <h1 class="text-white">Welcome to your dashboard</h1>

  <div class="text-green-500 bg-yellow-500 px-32">
    <!-- Additional content here -->
  </div>

  <div class="text-white px-20 mt-20">
    <table class="min-w-full divide-y divide-red-500">
      <thead class="bg-gray-800">
        <tr class="text-center">
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">ID</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Name</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Email</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Date Created</th>
          <th class="px-6 py-3 text-xs font-medium text-red-500 uppercase tracking-wider">Action</th>
        </tr>
      </thead>
      <tbody class="bg-gray-700 divide-y divide-gray-600 ">
        <tr class="text-white  text-center" v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ takeDate(user.created_at) }}</td>
          <td class="space-x-12">
            <button class=" p-3 bg-green-500 " @click="updateUser(user)">Edit</button>
            <button class=" p-3 bg-red-600" @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

    <div class=" w-96 mx-auto">
  <div v-if="updatedUser.id" class="text-white px-20 mt-10 ">

    
   <form onsubmit="event.preventDefault(); saveUser();" class="bg-gray-800 border border-gray-700 rounded-lg p-6 w-80">
    <h1 class="text-2xl font-semibold text-center mb-4">Edit User</h1>
    
    <div class="mb-4">
      <label for="name" class="block text-gray-400 mb-1">Name</label>
      <input
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
        type="email"
        id="email"
        name="email"
        class="w-full px-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500"
        placeholder="Email"
      />
    </div>
    
    <button type="submit" class="w-full py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-600">Save</button>
  </form>
  </div>
  </div>
</template>

