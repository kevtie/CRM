<script setup>
defineProps({
    clients: Object,
});
</script>
<template>
    <div class="w-1/2">
            <div class="flex font-semibold dark:text-gray-200">
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
</template>