<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    user: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Welcome {{ user.name }}, to the dashboard</div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">Your last activity was at {{ user.last_activity || 'No assigned tasks' }}</div>
                    <a :href="route('scrumboard')" class="rounded-full p-3 mb-3 bg-indigo-800">scrumboard</a>
                    <a :href="route('getClients')" class="rounded-full p-3 mb-3 bg-indigo-800">Contact list</a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
