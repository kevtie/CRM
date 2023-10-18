<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
defineProps({
        card: Object,
    });

const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
const page = usePage().props;
const scrum = computed(() => page.scrumId);
</script>

<template>
    <form :action="route('delCard', { scrumId: scrum })" method="post">
        <input type="hidden" name="_token" :value="csrfToken">
        <input type="hidden" name="cardId" :value="card.id">
        <input type="submit" value="Delete" class="p-3 mb-2 bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
    </form>
</template>