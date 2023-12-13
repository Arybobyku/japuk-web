<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Header from "./Header.vue";
import Umkms from "./Umkms.vue";
import Search from "./Search.vue";
import Body3 from "./Body3.vue";
import Body4 from "./Body4.vue";
import Footer from "./Footer.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    produks: Array,
    umkms: Array,
});
</script>

<template>
    <Head title="Welcome" />

    <div>
        <Header />


        <Search />

        <Umkms :umkms="umkms" />

        <!-- <Produks :produks="produks" /> -->

        <Footer />
    </div>
</template>
