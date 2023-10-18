<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
defineProps({
        card: Object,
        assignedUsers: Object,
    });

const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
const page = usePage().props;
const scrum = computed(() => page.scrumId);
</script>

<template>
    <div class="z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
        <b>Add Worker</b>
    
    <form :action="route('addUser', { scrumId: scrum })" method="post">
        <input type="hidden" name="_token" :value="csrfToken">
        <div v-for="assignedUser in assignedUsers" :key="assignedUser.id">
            <input type="checkbox" id="userId" name="userId[]" :value="assignedUser.id">
            <label :for="assignedUser.name">{{ assignedUser.name }}</label>
        </div>
        
        <input type="hidden" name="cardId" :value="card.id">
        <input type="submit" value="Verzenden" class="p-3 mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    </form>
    </div>
</template>