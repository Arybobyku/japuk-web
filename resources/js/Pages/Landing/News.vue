<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Header from "./Header.vue";
import Newss from "./Newss.vue";
import Footer from "./Footer.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    items: Array,
    
});

</script>

<template>
    <Head title="Berita" />

    <div>
        <Header />

        <Newss :items="items" />


        <Footer />
    </div>
</template>
