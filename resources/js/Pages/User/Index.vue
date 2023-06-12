<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';
import Edit from './partials/edit.vue'
import Delete from './partials/Delete.vue'

import Modal from '@/Components/Modal.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    users: Array,
});

const modalDelete = ref(false);
const selected = ref([]);
const selectAll = ref(false);

const showModalDelete = () => {
    modalDelete.value = true;

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
                    id selected: {{ selected }}
                </div>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div>
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox"
                                        v-model="selectAll"
                                        @click="select"
                                    />
                                    <i class="form-icon"></i>
                                </div>
                            </th>
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
                            <td scope="col" class="px-6 py-3">
                                <input
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    type="checkbox"
                                    :value="user.id"
                                    v-model="selected"
                                />
                                <i class="form-icon"></i>
                            </td>
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
                                    class="font-medium text-blue-600 hover:underline"
                                    @click="showModalDelete"
                                    >Delete</a
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <Modal :show="modalDelete" @close="closeModal" :max-width="xl">
            <Delete/>
        </Modal>
        
    </AuthenticatedLayout>
</template>
