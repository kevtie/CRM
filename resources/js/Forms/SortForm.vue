<script setup>
import { ref } from 'vue';
defineProps({
    sortBy: String,
    sortType: String,
})
const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
</script>

<template>
    <div>
        <form :action="route('sortClient')" method="post">
            <input type="hidden" name="sortClientName" :value="sortBy">
            <input type="hidden" name="sortType" :value="sortType">
            <input type="hidden" name="_token" :value="csrfToken">
            <input type="submit" :value="sortBy + ' ' + sortType" class="bg-indigo-900 rounded my-2 p-3 text-gray-200 hover:bg-indigo-800 focus:outline-none focus:ring focus:ring-indigo-200">
        </form>
    </div>
</template>
