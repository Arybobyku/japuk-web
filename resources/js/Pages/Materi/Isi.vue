<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    items: Array,
});
</script>
<template>
    <Head title="Materi" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
            <div v-for="(item, index) in items.data" :key="item.id">
                    <div
                        class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white my-4">
                        <p class="px-6 py-2 font-bold text-left text-xl"> {{ item.judul }}</p>

                        <p class="px-6 py-2 font-bold text-center text-2xl"> Sub Bab {{ item.sub_bab }}</p>
                        <img :src="item.image" class="mx-auto sm:w-screen lg:max-w-xl py-8">

                      <p class="sm:px-4 lg:px-16 py-4 " v-html="item.isi"></p>
                    </div>
            </div>
            <Pagination :links="items.links" />
        </div>
    </AuthenticatedLayout>
</template>
