<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    materis: Array,
});





</script>
<template>
    <Head title="Materi" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
           
            <div v-for="(data, index) in materis">
            <Link :href="route('isimateriumkm', data.id)">
                <div  class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white my-4">
                                    <p class="px-6 py-2 font-bold">{{ data.nama }}</p>
                                <p class="px-6 py-2 text-sm">{{ data.deskripsi }}</p>
                            </div>
                            </Link>
            </div>
        </div>
    </AuthenticatedLayout>

   
</template>
