<script setup>
defineProps({
    businesses: Object,
});
</script>
<template>
    <div class="w-1/2">
            <div class="flex font-semibold dark:text-gray-200">
                <div class="w-1/4 my-2">Name</div>
                <div class="w-1/4 my-2">Email</div>
                <div class="w-1/4 my-2">Tel.</div>
                <div class="w-1/4 my-2">Address</div>
            </div>
            <div v-for="business in businesses" :key="business.id" class="flex dark:text-gray-200">
                <div class="w-1/4 my-2">{{ business.name }}</div>
                <div class="w-1/4 my-2">{{ business.email || 'N.V.T.' }}</div>
                <div class="w-1/4 my-2">{{ business.tel_number || 'N.V.T.' }}</div>
                <div class="w-1/4 my-2">{{ business.address }}</div>         
            </div>
        </div>
</template>