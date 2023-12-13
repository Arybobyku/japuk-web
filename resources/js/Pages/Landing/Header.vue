<script setup>
import { ref } from 'vue';
import { Head, Link } from "@inertiajs/inertia-vue3";

const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

</script>

<template>
    <header class="w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto mt-2">
                <a href="#" class="flex items-center">
                    <img :src="'/images/logo.png'" class="h-8 mr-3 sm:h-9" alt="Sociopreneur Hub" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
                        Sociopreneur Hub
                    </span>
                </a>
                <!-- Button for Mobile Menu -->
                <button @click="toggleMobileMenu" class="lg:hidden focus:outline-none">
                    <svg class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
                <!-- Mobile Menu -->
                <transition name="fade">
                <div v-if="isMobileMenuOpen" class="lg:hidden">
                    <ul class="flex flex-col mt-4 font-medium">
                        <!-- Navigation Links -->
                         <li>
                                <Link :href="route('landing')" 
                                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                        Beranda</Link>
                            </li>
                            <li>
                                <Link :href="route('umkm')" 
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                    >UMKM</Link>
                            </li>
                            <li>
                                <Link  :href="route('news')" 
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                    >Berita</Link>
                            </li>
                            <li>
                                <Link :href="route('event')" 
                                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                        >Event</Link>
                                </li>
                                 <li>
                                        <Link    :href="route('login')"
                                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                                >Login</Link>
                                </li>
                                <li>
                                            <Link    :href="route('register')"
                                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                                    >Register</Link>
                                    </li>
    
                    </ul>
                </div>
                </transition>
                <!-- Desktop Menu -->
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1 mt-2"
                    :class="{ 'hidden': isMobileMenuOpen }" id="desktop-menu">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <!-- Navigation Links -->
                        <li>
                                <Link href="/"
                                                                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"

                                    >Beranda</Link>
                            </li>
                            <li>
                                <Link :href="route('umkm')" 
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                    >UMKM</link>
                            </li>
                            <li>
                                <Link :href="route('news')"
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                    >Berita</Link>
                            </li>
                            <li>
                                   <Link    :href="route('event')"
                                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                        >Event</Link>
                            </li>
                            <li>
                                            <Link    :href="route('login')"
                                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                                    >Login</Link>
                                    </li>
                                    <li>
                                                <Link    :href="route('register')"
                                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                                        >Register</Link>
                                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
</template>
<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease-in-out;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}</style>
