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
        <div class="w-1/2">
            <div class="flex dark:text-gray-200">
                <div class="w-1/5 my-2">Name</div>
                <div class="w-1/5 my-2">Email</div>
                <div class="w-1/5 my-2">Tel.</div>
                <div class="w-1/5 my-2">Address</div>
                <div class="w-1/5 my-2">Business</div>
            </div>
            <div v-for="client in clients" :key="client.id" class="flex dark:text-gray-200">
                <div class="w-1/5 my-2">{{ client.name }}</div>
                <div class="w-1/5 my-2">{{ client.email || 'N.V.T.' }}</div>
                <div class="w-1/5 my-2">{{ client.tel_number || 'N.V.T.' }}</div>
                <div class="w-1/5 my-2">{{ client.address }}</div>         
                <div class="w-1/5 my-2">{{ client.business?.name || 'N.V.T.' }}</div>
            </div>
        </div>
        <div class="flex py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <AddForm :businesses="businesses"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
