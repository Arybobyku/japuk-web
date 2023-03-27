<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';

import Modal from '@/Components/Modal.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    users: Array,
});

const modalEdit = ref(false);
const selected = ref([]);
const selectAll = ref(false);

const showModalEdit = () => {
    modalEdit.value = true;

};

const closeModal = () => {
    modalEdit.value = false;

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
                            <th scope="col" class="px-6 py-3">Judul</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b"
                            v-for="(materi, index) in materis"
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
                            <td class="px-6 py-4">{{ materi.nama }}</td>
                            <td class="px-6 py-4">{{ materi.deskripsi }}</td>
                          
                          
                            <td class="px-6 py-4">
                                <a
                                    class="font-medium text-blue-600 hover:underline"
                                    @click="showModalEdit"
                                    >Edit</a
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <Modal :show="modalEdit" @close="closeModal" :max-width="xl">
            <Edit/>
        </Modal>
        
    </AuthenticatedLayout>
</template>
