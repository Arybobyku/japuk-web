<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    produks: Array,
    umkm: Array,
});

</script>   

<template>
    <section class="bg-white dark:bg-gray-900 px-10 py-5">
        <div class="flex flex-row items-center justify-center">
            <div v-for="(data) in umkm">

            <span class="text-3xl font-bold text-center">List Produk {{ data.nama }}</span>
            </div>
        </div>
        <br />
        <div
            class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-5"
        >
            <div v-for="(data, index) in produks">
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="object-cover w-full h-56 p-4 py-2" :src="data.gambar" alt="Mountain" />
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-4 mt-4">
                    </span>
                    <div class="px-6 pt-2 mb-4">
                        <div class="font-bold text-xl mb-2">
                            {{ data.nama }}
                        </div>
                        <p class="text-gray-700 text-base">
                            {{ data.deskripsi }}
                        </p>
                        <p class="text-gray-700 text-base font-bold">
                            Rp. {{ data.harga }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
