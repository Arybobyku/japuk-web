<script setup>
const props = defineProps({
    umkms: Array,
});
</script>

<template>
    <section class="bg-white dark:bg-gray-900 px-10 py-5">
        <div class="flex flex-row items-center justify-center">
            <span class="text-3xl font-bold text-center text-orange-700">Daftar Umkm</span>
        </div>
        <br>
        <div
        class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-5"
        >
            <div v-for="(data, index) in umkms">
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="w-full h-56" :src="data.logo" alt="Mountain" />
                    <div class="px-6 py-4">
                        <h5 class="font-bold text-xl mb-2">
                            {{ data.nama }}
                        </h5>
                        <p class="text-sm font-light">{{ data.alamat }} </p>
                        <p class="text-sm  font-light">{{ data.no_hp }} </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
