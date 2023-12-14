<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';
import Edit from './partials/edit.vue'
import Delete from './Delete.vue'

import Modal from '@/Components/Modal.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    users: Array,
});

const modalDelete = ref(false);
const selected = ref([]);
const selectAll = ref(false);

const showModal = (modal, index) => {
     if (modal == "delete") {
        modalDelete.value = true;
        selected.value = index;

    }
};

const closeModal = () => {
    modalDelete.value = false;

};

const select = () => {
    selected .value= [];
    if (!selectAll) {
        for (let i in props.users) {
            selected.push(props.users[i].id);
        }
    }
};
</script>

<template>
    <Head title="User" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="text-uppercase text-bold">
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>

                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Role</th>
                            <th scope="col" class="px-6 py-3">Umkm</th>
                            <th scope="col" class="px-6 py-3">Logo</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b"
                            v-for="(user, index) in users"
                        >

                            <td class="px-6 py-4">{{ user.name }}</td>
                            <td class="px-6 py-4">{{ user.email }}</td>
                            <td class="px-6 py-4">
                                {{
                                    user.role === 2
                                        ? "SuperAdmin"
                                        : user.role === 1
                                        ? "Admin"
                                        : "User"
                                }}
                            </td>
                            <td class="px-6 py-4">{{ user.umkm.nama }}</td>
                            <td class="px-6 py-4">
                                <img
                                    class="object-fill h-20 w-20"
                                    :src="user.umkm.logo"
                                />
                            </td>
                            <td class="px-6 py-4">
                               <a
                                            class="font-medium text-red-600 hover:text-red-900"
                                            @click="showModal('delete', index)"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                />
                                            </svg>
                                        </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


       
    </AuthenticatedLayout>
         <Modal :show="modalDelete" @close="closeModal">
                <Delete @close="closeModal" :user="users[selected]" />
            </Modal>
</template>
