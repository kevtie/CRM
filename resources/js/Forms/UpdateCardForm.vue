<script setup>
import Type from '@/Forms/Radio/RadioType.vue';
import Category from '@/Forms/Radio/RadioCategory.vue';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
defineProps({
        card: Object,
    });

const csrfToken = ref(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
const page = usePage().props;
const scrum = computed(() => page.scrumId);
let checkedId = scrum.value;
if(typeof scrum.value === 'undefined'){
    checkedId = 0;
}
</script>

<template>
    <form :action="route('changeCat', { scrumId: checkedId })" method="post">
        <Category class="mb-2" />
        <Type class="mb-2" />
        <input name="cardId" type="hidden" :value="card.id">
        <input type="hidden" name="_token" :value="csrfToken">
        <input type="submit" class="mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    </form>
</template>