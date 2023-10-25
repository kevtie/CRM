<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AddForm from '@/Forms/AddContactsForm.vue';
import ClientList from '@/Lists/ClientList.vue';
import BusinessList from '@/Lists/BusinessList.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    clients: Object,
    businesses: Object,
});

let showClient = true;
const hidden = { 'hidden': 'hidden', 'notHidden': '' };
let status1 = 'notHidden';
let status2 = 'hidden'

function isHidden(){
    if(showClient === true){
        showClient = !showClient;
        status1 = 'notHidden'
        status2 = 'hidden'
    }else{
        showClient = !showClient;
        status1 = 'hidden'
        status2 = 'notHidden'
    }    
    console.log(showClient);
}
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
