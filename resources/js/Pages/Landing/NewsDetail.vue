<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import Header from "./Header.vue";

// import route from "vendor/tightenco/ziggy/src/js";

const props = defineProps({
    item: Object,
});

</script>   
<template>
<Header />
    <section class="bg-white dark:bg-gray-900 px-10 py-5">
        <div class="flex flex-row items-center justify-center">

            <span class="text-3xl font-bold  text-orange-800 text-center py-8">{{ item.title }}</span>

        </div>
           <img :src="item.image" class="mx-auto sm:w-screen lg:max-w-xl py-4">

        <p class="px-16"> {{ item.created_at }}</p>
        <br/>
            <p class="sm:px-4 lg:px-16 py-4 " v-html="item.isi"></p>
    </section>
</template>

<style>

</style>