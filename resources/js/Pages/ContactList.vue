<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AddForm from '@/Forms/AddContactsForm.vue';
import SortForm from '@/Forms/SortForm.vue';
import ClientList from '@/Lists/ClientList.vue';
import BusinessList from '@/Lists/BusinessList.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    clients: Object,
    businesses: Object,
});

function toggle(d, d2) {
    var x = document.getElementById(d);
    var x2 = document.getElementById(d2);
    if (x.style.display === "none") {
        x.style.display = "block";
        x2.style.display = "none";
    } else {
        x.style.display = "none";
        x2.style.display = "block";
    }
}
</script>

<template>
    <Head title="Client List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Client List</h2>
        </template>
        
        <button @click="toggle('list', 'list2')" class="bg-indigo-900 rounded my-2 p-3 text-gray-200 hover:bg-indigo-800 focus:outline-none focus:ring focus:ring-indigo-200">
            Toggle List
        </button>
        <div class="flex">
            <SortForm :sortType="'asc'" :sortBy="'name'" class="mr-2"/>
            <SortForm :sortType="'desc'" :sortBy="'name'" class="mr-2"/>
            <SortForm :sortType="'asc'" :sortBy="'email'" class="mr-2"/>
            <SortForm :sortType="'desc'" :sortBy="'email'" class="mr-2"/>
            <SortForm :sortType="'asc'" :sortBy="'address'" class="mr-2"/>
            <SortForm :sortType="'desc'" :sortBy="'address'" class="mr-2"/>
        </div>
        <div id="list" style="display: block;">
            <ClientList :clients="clients" />
        </div>
        <div id="list2" style="display: none;">
            <BusinessList :businesses="businesses" />
        </div>
        
        <div class="flex py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <AddForm :businesses="businesses" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
