<script setup>
const props = defineProps({
    umkms: Array,
});
</script>

<template>
    <section class="bg-white dark:bg-gray-900 px-10 py-5">
        <div class="flex flex-row items-center justify-between">
            <span class="text-3xl font-bold">List Umkm</span>

            <div class="flex text-indigo-600">Lihat Semua</div>
        </div>
        <br>
        <div
        class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-5"
        >
            <div v-for="(data, index) in umkms">
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="w-full h-56" :src="data.logo" alt="Mountain" />
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">
                            {{ data.nama }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
