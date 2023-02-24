<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Header from "./Header.vue";
import Body1 from "./Body1.vue"
import Body2 from "./Body2.vue"
import Body3 from "./Body3.vue"
import Body4 from "./Body4.vue"
import Footer from "./Footer.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <Header />

    <Body1 />

    <Body2 />

    <Body3 />

    <Body4 />

    <Footer />
</template>
