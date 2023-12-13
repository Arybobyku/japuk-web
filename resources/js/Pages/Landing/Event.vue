<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Header from "./Header.vue";
import Events from "./Events.vue";
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

        <Events :items="items" />


        <Footer />
    </div>
</template>
