<script setup>
defineProps({
    clients: Object,
});
</script>
<template>
    <div class="">
            <div class="flex font-semibold dark:text-gray-200 h-px py-0.5 rounded my-2 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="w-1/5 my-2 text-xl">Name</div>
                <div class="w-1/5 my-2 text-xl">Email</div>
                <div class="w-1/5 my-2 text-xl">Tel.</div>
                <div class="w-1/5 my-2 text-xl">Address</div>
                <div class="w-1/5 my-2 text-xl">Business</div>
            </div>
            <div class="h-px py-0.5 rounded my-8 bg-gray-200 border-0 dark:bg-gray-700"></div>
            <div v-for="client in clients" :key="client.id" class="flex dark:text-gray-200 hover:bg-indigo-800">
                <div class="w-1/5 my-2 ">{{ client.name }}</div>
                <div class="w-1/5 my-2 ">{{ client.email || 'N.V.T.' }}</div>
                <div class="w-1/5 my-2 ">{{ client.tel_number || 'N.V.T.' }}</div>
                <div class="w-1/5 my-2 ">{{ client.address }}</div>         
                <div class="w-1/5 my-2 ">{{ client.business?.name || 'N.V.T.' }}</div>
            </div>
        </div>
</template>