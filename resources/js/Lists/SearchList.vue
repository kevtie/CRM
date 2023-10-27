<script setup>
    import { router } from '@inertiajs/vue3'
    function search(e) {
        router.get(route('getClients'), { term: e.target.value } ,{preserveState: true});
    }
</script>
<template>
    <div>
        <label for="search" class="text-gray-200">Search</label>
        <input type="text" @keyup="search" class="ml-2 px-2 py-1 text-sm rounded border">
    </div>
</template>