<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
const props = defineProps({
    produks: Array,
});
</script>

<template>
    <Head title="Komentar" />
    <AuthenticatedLayout>
        <section class="dark:bg-gray-900 px-10 py-5">
            <div
                class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-5"
            >
                <div v-for="(data, index) in produks">
                    <Link :href="route('komentarDetail',data.id)">
                        <div class="rounded overflow-hidden shadow-lg">
                            <img
                                class="w-full h-56"
                                :src="data.gambar"
                                alt="Mountain"
                            />
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 ml-4 mt-4"
                            >
                                {{ data.umkm.nama }}
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
                    </Link>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
