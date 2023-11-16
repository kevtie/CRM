<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    deadlines: Object,
    deadlinesCount: Object, 
    clearPercentage: Number,
    lateScrumboardsName: Object,
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
                <div class="flex bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="w-1/2">
                        <div class="p-6 text-gray-900 dark:text-gray-100">Welcome {{ user.name }}, to the dashboard</div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">Your last activity was at {{ user.last_activity || 'No assigned tasks' }}</div>
                    </div>
                    {{ lateScrumboard }}
                    <div class="w-1/2 ">
                        <div class="align-center text-center rounded-lg bg-indigo-900">
                            <div v-if="clearPercentage === 100" class="font-semibold text-gray-200">No deadlines are late!</div>
                            <div v-else class="font-semibold text-gray-200">At the moment {{ deadlinesCount }} deadline(s) are overdue!</div>
                            <div class="text-center justify-center">
                                <div class="relative bg-red-700 rounded-full h-4 align-center my-5">
                                <div class="absolute text-center text-white w-full leading-4">{{parseFloat(clearPercentage).toFixed(2)}}%</div>
                                <div class="bg-blue-600 h-4 rounded-full" :style="`width: ${clearPercentage}%`"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
