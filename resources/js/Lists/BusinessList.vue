<script setup>
defineProps({
    businesses: Object,
});
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
            <div v-for="business in businesses" :key="business.id" class="flex dark:text-gray-200 hover:bg-indigo-800">
                <div class="w-1/4 my-2 divide-x">{{ business.name }}</div>
                <div class="w-1/4 my-2 divide-x">{{ business.email || 'N.V.T.' }}</div>
                <div class="w-1/4 my-2 divide-x">{{ business.tel_number || 'N.V.T.' }}</div>
                <div class="w-1/4 my-2 divide-x">{{ business.address }}</div>         
            </div>
        </div>
</template>