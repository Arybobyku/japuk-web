<script setup>
    import {
        Head,
        Link,
        useForm
    } from "@inertiajs/inertia-vue3";
import '@splidejs/vue-splide/css';
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
const props = defineProps({
    news: Array,
    events: Array,
});

</script>
<template>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen mx-auto space-y-12 lg:space-y-20 lg:px-6 ">
            <!-- Row -->
                <div class="items-center gap-8">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400 relative">
                    <Splide :options="{
                        speed: 1000,
                        type: 'loop',
                        autoplay: 'resume',
                        perPage: 1,
                        heightRatio: 0.5,
                    }" aria-label="My Favorite Images">
                    <SplideSlide v-for="(data, index) in news" :key="index">
                        <img :src="data.image" class="w-screen">
                        <!-- Add your text here -->
                         <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black opacity-50">
                         </div>
                        <div class="absolute top-0 px-2 pb-2 left-0 lg:left-40 right-0 bottom-20 flex items-center justify-left">
                            <p class="text-white font-serif font-bold text-sm lg:text-2xl">{{ data.title }}</p>
                        </div>
                           <div class="absolute top-0 px-2 left-0 lg:left-40 right-0 bottom-0 flex items-center justify-left">
                                <p class="text-white font-serif text-xs lg:text-lg">{{ data.excerpt }}</p>       
                        </div>
                      <div class="absolute top-20 pt-20 px-2 left-0 lg:left-40 right-0 bottom-0 flex items-center justify-left">
                          <a class="bg-green-800 text-white font-bold py-2  px-4 rounded-md transition duration-300 ease-in-out hover:bg-green-600">
                            View More
                            </a>
                      </div>

                    </SplideSlide>
                    </Splide>
                </div>
                </div>

            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <img class="w-full mb-4 rounded-lg lg:mb-0 lg:flex ransition ease-in-out delay-150 hover:-translate-y-1 hover:scale-125 duration-300" :src="'/images/about.jpg'"
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
                            <svg class="flex-shrink-0 w-5 h-5 text-orange-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Materi Seputar UMKM</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-orange-600 " fill="currentColor"
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
                <div class="lg:grid lg:grid-cols-2 grid grid-cols-1 place-items-center container gap-1 mx-auto mb-10">
                    <img class="h-40 w-40" src="/images/logousu.png" alt="">
                    <img class="h-40" src="/images/logofebusu.png" alt="">
                </div>
            <div class=" bg-green-50">
            <h1 class="text-center text-6xl font-semibold py-16 text-gray-900">Event</h1>
                  <div v-if="events.length == 0">
                        <h1 class="text-center py-16 text-amber-800 text-2xl">Belum Ada Pengumuman Event</h1>
                    </div>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-2 pb-16" >
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" v-for="(data, index) in events" :key="index" >
                            <div class="place-items-center w-96 h-80 overflow-hidden">
                                <img class="object-cover w-96 h-80" src="https://source.unsplash.com/1900x600?forest" alt="Sunset in the mountains">
                            </div>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ data.title }}</div>
                            <p class="text-gray-700 text-sm">
                                {{ data.excerpt }}
                            </p>
                        </div>
                        <div class="pt-4 pb-2 px-6">
                            <a href="/article/"
                                class="inline-block bg-green-800 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
