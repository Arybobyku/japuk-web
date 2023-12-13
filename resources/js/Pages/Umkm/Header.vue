<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

</script>

<template>
    <header class=" w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto mt-2"
            >
                <a href="#" class="flex items-center">
                    <img
                        :src="'images/logo.png'"
                        class="h-8 mr-3 sm:h-9"
                        alt="Landwind Logo"
                    />
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
                        >Sociopreneur Hub</span
                    >
                </a>
                <div class="flex items-center lg:order-2">
                    <Link
                        :href="route('register')"
                        class="mt-2 mr-4 sm:inline-block"
                    >
                        Register
                    </Link>
                    <Link
                        :href="route('login')"
                        class="mt-2 mr-4 sm:inline-block bg-indigo-600 btn px-3 py-1 text-white rounded-lg"
                    >
                        Login
                    </Link>
                </div>
                <div
                    class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1 mt-2"
                    id="mobile-menu-2"
                >
                    <ul
                        class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                    >
                        <li>
                            <a
                                href="#"
                                class="block py-2 pl-3 pr-4 text-white bg-green-600 rounded lg:bg-transparent lg:text-green-600 lg:p-0 dark:text-white"
                                aria-current="page"
                                >Beranda</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                >UMKM</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600  lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                >Berita</a
                            >
                        </li>
                        <li>
                                <a
                                    href="#"
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                    >Event</a
                                >
                            </li>
<!-- 
                        <li>
                            <a
                                href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                >Contact</a
                            >
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
