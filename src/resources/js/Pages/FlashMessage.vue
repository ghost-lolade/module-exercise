<template>
    <div v-if="visible" :class="['fixed top-4 right-4 px-4 py-2 rounded shadow-lg', typeClass]">
      <span>{{ message }}</span>
    </div>
  </template>

  <script>
  export default {
    props: {
      type: {
        type: String,
        default: 'success', // 'success' or 'error'
      },
      message: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        visible: true, // Controls visibility of the flash message
      };
    },
    computed: {
      typeClass() {
        return this.type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white';
      },
    },
    mounted() {
      // Auto-hide the flash message after 5 seconds
      setTimeout(() => {
        this.visible = false;
      }, 5000);
    },
  };
  </script>

  <style>
  /* Optional: Customize styling as needed */
  </style>
