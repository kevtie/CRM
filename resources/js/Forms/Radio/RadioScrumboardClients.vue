<script setup>
defineProps({
       clients: Object,
    });
</script>
<template>
    <div id="clientRadio" class="z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200">
            <div class="max-h-32 overflow-y-scroll">
            <div v-for="client in clients" :key="client.id">
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input :id="'clientRadio' + client.id" type="radio" :value="client.id" name="clientRadio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label :for="'clientRadio' + client.id" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ client.name }}</label>
                        </div>
                    </li>
                </div>
            </div>
        </ul>
    </div>
</template>