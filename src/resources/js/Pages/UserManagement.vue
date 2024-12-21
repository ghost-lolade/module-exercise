<template>
    <div>
      <!-- Flash Message -->
      <FlashMessage
        v-if="flash.visible"
        :type="flash.type"
        :message="flash.message"
      />

      <!-- User Management Table -->
      <h1 class="text-lg font-bold">User Management</h1>
      <table class="table-auto w-full mt-4">
        <thead>
          <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td class="border px-4 py-2">{{ user.name }}</td>
            <td class="border px-4 py-2">{{ user.email }}</td>
            <td class="border px-4 py-2">
              <span :class="user.enabled ? 'text-green-500' : 'text-red-500'">
                {{ user.enabled ? 'Enabled' : 'Disabled' }}
              </span>
            </td>
            <td class="border px-4 py-2">
              <button
                class="px-4 py-2 bg-blue-500 text-white rounded mr-2"
                @click="toggleUser(user, !user.enabled)"
              >
                {{ user.enabled ? 'Disable' : 'Enable' }}
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  import FlashMessage from './FlashMessage.vue';
  import axios from 'axios';

  export default {
    components: {
      FlashMessage,
    },
    data() {
      return {
        users: [], // Array of users
        flash: {
          visible: false,
          message: '',
          type: 'success', // 'success' or 'error'
        },
      };
    },
    mounted() {
      this.fetchUsers();
    },
    methods: {
      fetchUsers() {
        axios.get('/users')
          .then(response => {
            const usersData = response.data; // Data in the given format
            this.users = Object.values(usersData);
            this.showFlashMessage('Users loaded successfully!', 'success');
          })
          .catch(error => {
            console.error('Error fetching users:', error);
            this.showFlashMessage('Error fetching users. Please try again.', 'error');
          });
      },
      toggleUser(user, status) {
        const route = status ? `/users/enable/${user.id}` : `/users/disable/${user.id}`;
        axios.post(route)
          .then(response => {
            const updatedUser = response.data;
            const index = this.users.findIndex(u => u.id === updatedUser.id);
            if (index !== -1) {
              this.users.splice(index, 1, updatedUser);
            }
            this.showFlashMessage(response.message || `User ${status ? 'enabled' : 'disabled'} successfully.`, 'success');
          })
          .catch(error => {
            console.error('Error toggling user status:', error);
            this.showFlashMessage('Error toggling user status. Please try again.', 'error');
          });
      },
      showFlashMessage(message, type) {
        this.flash = {
          visible: true,
          message,
          type,
        };

        // Auto-hide flash message after 5 seconds
        setTimeout(() => {
          this.flash.visible = false;
        }, 5000);
      },
    },
  };
  </script>
