<script setup>
    import {
        Head,
        Link,
        useForm
    } from "@inertiajs/inertia-vue3";
</script>

<template>
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                        JAPUK Platform
                    </h2>
                    <p class="mb-8 font-light lg:text-xl">
                        Membantu 100+ UMKM dan bisnis untuk saling berbagi tentang masukan produk
                    </p>
                    <!-- List -->

                    <p class="mb-8 font-light lg:text-xl">
                        UMKM Berdaya, Ekonomi Pulih, Indonesia Bangkit dan Maju
                    </p>
                </div>
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex ransition ease-in-out delay-150 hover:-translate-y-1 hover:scale-125 duration-300" :src="'/images/11.svg'"
                    alt="dashboard feature image" />
            </div>
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex ransition ease-in-out delay-150 hover:-translate-y-1 hover:scale-125 duration-300" :src="'/images/12.svg'"
                    alt="feature image 2" />
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                        Menjadi Platform Berbagi
                    </h2>
                    <p class="mb-8 font-light lg:text-xl">
                        Tranformasi Digital UMKM Menuju Bisnis Modern yang Kuat dan Bermartabat
                    </p>
                    <!-- List -->
                    <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Materi Seputar UMKM</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Fitur Komentar</span>
                        </li>
                      
                    </ul>
                    <p class="font-light lg:text-xl">
                       Jaringan Perempuan Pengusaha UMKM
                    </p>
                </div>
            </div>
            <p class="text-xl text-center font-medium text-gray-900 md:text-2xl dark:text-white">
                Didukung Oleh
            </p>
            <div class="">
                <div class="lg:grid lg:grid-cols-2 grid grid-cols-1 place-items-center container gap-1 mx-auto mb-10">
                    <img class="h-40 w-40" src="/images/logousu.png" alt="">
                    <img class="h-40" src="/images/logofebusu.png" alt="">
                </div>
            </div>
        </div>
    </section>
</template>
