<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import scrumboardForm from '@/Forms/AddScrumBoardForm.vue';
import CardForm from '@/Forms/CardForm.vue';
import UpdateForm from '@/Forms/UpdateCardForm.vue';
import AssignUserForm from '@/Forms/AssignUserForm.vue';
import DelCard from '@/Forms/DeleteCardButton.vue';
import { Head, usePage } from '@inertiajs/vue3';
defineProps({
    scrumboards: Object,
    categories: Object,
    scrumId: String,
    assignedUsers: Object,
    currentUser: Number,
    clients: Object,
});

const props = usePage().props;
const urlParameter = props.scrumId;
const color = { '1': 'bg-green-300', '2': 'bg-yellow-300', '4': 'bg-blue-300', '3': 'bg-orange-400' }
const date = new Date();
let year = date.getFullYear();
let month = ("0" + (date.getMonth() + 1)).slice(-2);
let day = ("0" + date.getDate()).slice(-2);
const fullDate = year + '-' + month + '-' + day;
let exist = true;
if (typeof urlParameter === 'undefined'){
    exist = false;
}else{
    exist = true;
}

function toggle(d) {
    var x = document.getElementById(d);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


</script>

<template>
    <Head title="Scrumboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Scrumboard</h2>
        </template>
        
        <div class="flex">
            
            <div class="">
                <div class="my-6 w-1/5 mr-8" v-for="scrumboard in scrumboards" :key="scrumboard.id">
                    <a :href="route('getCards', {scrumId: scrumboard.id})" style="white-space: nowrap" class="rounded-full dark:text-gray-200 leading-tight bg-indigo-950 p-3">{{ scrumboard.name }}</a>
                </div>
            </div>
            <div v-if="currentUser === 1">
                <scrumboardForm :clients="clients"/>
            </div>
            <div v-if="exist = true" class="flex w-3/5">
                <div class="rounded p-3 w-1/4 dark:text-gray-200" v-for="category in categories" :key="category.id">
                    <b>{{ category.name }}</b>
                    <div class="" v-for="card in category.cards" :key="card.id">
                            <button @click="toggle('categoryForm' + card.id)" :class="color[card.type_id] + ' rounded my-2 p-3 text-stone-700'">
                                {{ card.content }}
                                <div v-if="card.deadline < fullDate && card.category_id != 3">!</div>
                            </button>                        
                        <div :id="'categoryForm' + card.id" style="display: none;">
                            <div v-if="card.deadline" class="z-10 w-48 mb-2 text-center bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                                <div class="font-semibold text-center">Deadline</div>
                                {{ card.deadline }}
                            </div>
                            <div class="z-10 w-48 mb-2 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                                <div class="font-semibold text-center">Assigned people</div>
                                {{ assignedToCard }}
                            </div>
                            <UpdateForm :card="card" />
                            <AssignUserForm :card="card" :assignedUsers="assignedUsers" />
                            <DelCard :card="card" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 w-1/5">
                <CardForm :currentUser="currentUser"/>
            </div>
        </div>
        
        
    </AuthenticatedLayout>
</template>