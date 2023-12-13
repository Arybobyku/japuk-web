<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
// import route from "vendor/tightenco/ziggy/src/js";

const props = defineProps({
    items: Array,
});

</script>   

<template>
    <section class="bg-white dark:bg-gray-900 px-10 py-5">
        <div class="flex flex-row items-center justify-center">

            <span class="text-3xl font-bold  text-orange-800 text-center">Berita</span>
        </div>
        <br />  
        <div class="h-screen" v-if="items.length < 1">
                                <h1 class="text-center py-16 text-amber-800 text-2xl">Belum Ada Pengumuman Event</h1>
            </div>
                          <div class="grid grid-cols-1 md:grid-cols-3 gap-2 p-2 pb-16" >
                              <div  v-for="(item, index) in items.data" :key="item.id">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg" >

                                <div class="place-items-center w-full h-64 overflow-hidden">
                                    <img class="object-cover w-full h-64" :src="item.image" alt="Sunset in the mountains">
                                </div>
                            <div class="px-6 py-2">
                                <div class="font-bold text-xl mb-2">{{ item.title }}</div>
                                 <p class="text-gray-700 text-xs py-1">
                                            {{ item.created_at }}
                                        </p>
                                <p class="text-gray-700 text-sm">
                                    {{ item.excerpt }}
                                </p>
                                
                            </div>
                            <div class="pt-4 pb-2 px-6">
                                <a :href="route('news.detail', item.id)"
                                    class="inline-block bg-green-800 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2  transition duration-300 ease-in-out hover:bg-green-600">Read
                                    More</a>
                                    
                            </div>
                        </div>
                    </div>
                    
                </div>
                <Pagination :links="items.links" />
    </section>
</template>
