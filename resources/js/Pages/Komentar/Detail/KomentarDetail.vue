<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
const props = defineProps({
    produk: Object,
    komentars: Array,
});
const form = useForm({
    komentar: "",
    idProduk: props.produk.id,
});

const submit = () => {
    form.post(route("komentarSend"), {});
};
</script>

<template>
    <Head title="Komentar" />
    <AuthenticatedLayout>
        <section class="dark:bg-gray-900 px-10 mb-20">
            <!-- Start Header -->
            <div
                class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200"
            >
                <div class="relative flex items-center space-x-4">
                    <div class="relative">
                        <span class="absolute text-green-500 right-0 bottom-0">
                            <svg width="20" height="20">
                                <circle
                                    cx="8"
                                    cy="8"
                                    r="8"
                                    fill="currentColor"
                                ></circle>
                            </svg>
                        </span>
                        <img
                            :src="produk.umkm.logo"
                            class="w-10 sm:w-16 h-10 sm:h-16 rounded-full"
                        />
                    </div>
                    <div class="flex flex-col leading-tight">
                        <div class="text-2xl mt-1 flex items-center">
                            <span class="text-gray-700 mr-3">
                                {{ produk.umkm.nama }}</span
                            >
                        </div>
                        <span class="text-lg text-gray-600">Forum Diskusi</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <img
                        :src="produk.gambar"
                        class="w-10 sm:w-16 h-10 sm:h-16"
                    />
                    <div>
                        <p class="text-gray-700 text-base">
                            {{ produk.nama }}
                        </p>
                        <p class="text-gray-700 text-base font-bold">
                            Rp. {{ produk.harga }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <!-- Start Body Chat -->
            <div
                id="messages"
                class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch"
            >
                <div v-for="(data, index) in komentars">
                    <div
                        class="chat-message"
                        v-if="$page.props.auth.user.id != data.id_user"
                    >
                        <div class="flex items-end">
                            <div
                                class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start"
                            >
                                <div>
                                    <span
                                        class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600"
                                        >{{ data.komentar }}</span
                                    >
                                </div>
                            </div>
                            <img
                                alt="My profile"
                                class="w-6 h-6 rounded-full order-1"
                            />
                        </div>
                    </div>

                    <div class="chat-message" v-else>
                        <div class="flex items-end justify-end">
                            <div
                                class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end"
                            >
                                <div>
                                    <span
                                        class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white"
                                        >{{ data.komentar }}</span
                                    >
                                </div>
                            </div>
                            <img
                                alt="My profile"
                                class="w-6 h-6 rounded-full order-2"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Body Char -->
        </section>
        <div
            class="fixed bottom-0 border-t-2 border-gray-200 px-4 p-4 bg-white"
        >
            <form @submit.prevent="submit">
                <div class="flex">
                    <input
                        type="text"
                        placeholder="Write your message!"
                        v-model="form.komentar"
                        class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3"
                    />
                    <div
                        class=""
                    >
                        <PrimaryButton
                            :disabled="form.processing"
                            class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none"
                        >
                            <span class="font-bold">Send</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-6 w-6 ml-2 transform rotate-90"
                            >
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"
                                ></path>
                            </svg>
                        </PrimaryButton>
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
