<script setup>
import RadioClient from './Radio/RadioClient.vue';
import RadioBusinesses from './Radio/RadioBusinesses.vue';
import { ref } from 'vue';
defineProps({
       businesses: Object,
    });

const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
const showInput = ref(false);

function handleClientRadioChange(radioValue){
    showInput.value = radioValue;
}
</script>

<template>
    <div class="z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
        <div class="font-semibold text-center dark:text-gray-200">Add Client or Business</div>
        <form :action="route('addClient')" method="post">
            <input type="text" name="varName" placeholder="Name*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="email" name="varEmail" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="tel" name="varTel" placeholder="Tel. Number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="text" name="varAddress" placeholder="Address*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="hidden" name="_token" :value="csrfToken">
            <RadioClient @on-client-radio-change="handleClientRadioChange"/>
            <div v-show="showInput">
                <RadioBusinesses :businesses="businesses" />
            </div>
            <input type="submit" value="Verzenden" class="p-3 mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
    </div>
</template>