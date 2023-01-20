<script setup>
defineProps({
    value:{
        default: null,
    },
    isRequired:{
        default:false,
    },
});
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}  <span v-if="isRequired" class="text-red-700">*</span> </span>
        <span v-else><slot /></span>
    </label>
</template>
