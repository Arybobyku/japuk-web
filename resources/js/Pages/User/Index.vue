<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";

defineProps({
    users: Array,
});
</script>

<template>
    <Head title="User" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Umkm</th>
                            <th scope="col" class="px-6 py-3">Logo</th>
                            <th scope="col" class="px-6 py-3">Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b" v-for='(user, index) in users'>
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                            >
                                {{index+1}}
                            </th>
                            <td class="px-6 py-4">  {{user.name}}</td>
                            <td class="px-6 py-4">  {{user.email}}</td>
                            <td class="px-6 py-4">{{ user.umkm.nama }}</td>
                            <td class="px-6 py-4">  <img class="object-fill h-20 w-20" :src=" user.umkm.logo "></td>
                            <td class="px-6 py-4">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 hover:underline"
                                    >Edit</a
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
