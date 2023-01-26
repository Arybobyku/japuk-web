<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);
const classes = computed(() =>
    props.active
        ? 'flex items-center p-2 space-x-3 rounded-md bg-indigo-500 text-white hover:bg-indigo-200 hover:text-black'

        : 'flex items-center p-2 space-x-3 rounded-md hover:bg-indigo-200'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
