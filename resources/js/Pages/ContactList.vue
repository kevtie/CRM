<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AddForm from '@/Forms/AddContactsForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    clients: Object,
    list: Object,
    businesses: Object,
});
</script>

<template>
    <Head title="Client List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Client List</h2>
        </template>
        <div class="flex col-auto text-gray-200">
            <div class="col-3 my-2 mx-4">Name</div>
            <div class="col-3 my-2 mx-4"></div>
            <div class="col-3 my-2 mx-4"></div>
            <div class="col-3 my-2 mx-4"></div>
            <div class="col-3 my-2 mx-4"></div>
            <div v-for="client in clients" :key="client.id" class="flex col-auto text-gray-200">
                <div class="col-3 my-2 mx-4">{{ client.name }}</div>
                <div class="col-3 my-2 mx-4">{{ client.email }}</div>
                <div class="col-3 my-2 mx-4">{{ client.tel_number }}</div>
                <div class="col-3 my-2 mx-4">{{ client.address }}</div>
                <div class="col-3 my-2 mx-4">{{ client.business.name }}</div>
                <!-- <div v-for="column in client" :key="column">
                    <div class="col-3 my-2 mx-4">{{ column }}</div>
                </div> -->
            </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <AddForm :businesses="businesses"/>
                </div>
            </div>
        </div>
        </div>
    </AuthenticatedLayout>
</template>
