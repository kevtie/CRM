<script setup>
import { ref } from "vue";

defineProps({
    businesses: Object,
});
const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
</script>
<template>
    <div class="">
            <div class="flex font-semibold dark:text-gray-200 h-px py-0.5 rounded my-2 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="w-1/4 my-2 text-xl">Name</div>
                <div class="w-1/4 my-2 text-xl">Email</div>
                <div class="w-1/4 my-2 text-xl">Tel.</div>
                <div class="w-1/4 my-2 text-xl">Address</div>
            </div>
            <div class="h-px py-0.5 rounded my-8 bg-gray-200 border-0 dark:bg-gray-700"></div>
            <div class="max-h-96 overflow-y-auto">
                <div v-for="business in businesses" :key="business.id" class="flex mb-2 dark:text-gray-200 hover:bg-indigo-800">
                    <div class="w-1/4 my-2 divide-x">{{ business.name }}</div>
                    <div class="w-1/4 my-2 divide-x">{{ business.email || 'N.V.T.' }}</div>
                    <div class="w-1/4 my-2 divide-x">{{ business.tel_number || 'N.V.T.' }}</div>
                    <div class="w-1/4 my-2 divide-x">{{ business.address }}</div>
                    <form :action="route('delContact')" method="post">
                        <input type="hidden" name="id" :value="business.id">
                        <input type="hidden" name="contact" value="business">
                        <input type="hidden" name="_token" :value="csrfToken">
                        <input type="submit" value="Delete" class="rounded p-3 bg-red-600">
                    </form>
                </div>
            </div>
        </div>
</template>