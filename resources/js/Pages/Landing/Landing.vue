<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Header from "./Header.vue";
import Body3 from "./Body3.vue";
import Body4 from "./Body4.vue";
import Footer from "./Footer.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    news: Array,
    events: Array,
});
</script>

<template>
    <Head title="Welcome" />

    <div>
        <Header />

        <Body3 :news="news" :events="events"/>
        <!-- <Body4 /> -->


        <Footer />
    </div>
</template>
