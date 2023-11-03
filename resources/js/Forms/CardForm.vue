<script setup>
import Type from '@/Forms/Radio/RadioType.vue';
import Category from '@/Forms/Radio/RadioCategory.vue';
import DelScrum from './DeleteScrumboardButton.vue';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

defineProps({
    currentUser: Number
})

const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
const page = usePage().props;
const scrum = computed(() => page.scrumId);
const date = new Date();
let year = date.getFullYear();
let month = date.getMonth() + 1;
let day = date.getDate();
const fullDate = year + '-' + month + '-' + day;
let checkedId = scrum.value;
if(typeof scrum.value === 'undefined'){
    checkedId = 0;
}
</script>

<template>
    <div v-if="checkedId > 0" class="bg-indigo-950 border-indigo-800 rounded-lg float-right mx-5 my-3 p-3">
        <div class="text-white"><b>Add a Card</b></div>
        <form :action="route('addCard', { scrumId: checkedId })" method="post" class="mb-3">
            <input id="content" name="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text">
            <input id="deadline" name="deadline" :min="fullDate" class="my-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="date">
            <Type class="my-3"/>
            <Category class="my-3" />
            <input type="hidden" name="_token" :value="csrfToken">
            <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
        <div v-if="currentUser = 1">
            <DelScrum />
        </div>
    </div>
</template>