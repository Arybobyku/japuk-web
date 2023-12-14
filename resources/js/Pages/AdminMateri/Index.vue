<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Modal from "@/Components/Modal.vue";
import Create from "./Create.vue";
import Edit from "./Edit.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Delete from "./Delete.vue";
import { ref } from "vue";

const props = defineProps({
    materis: Array,
});

const modalCreate = ref(false);
const modalEdit = ref(false);
const modalDelete = ref(false);
const selected = ref(0);

const showModal = (modal, index) => {
    if (modal === "create") {
        modalCreate.value = true;
    } else if (modal === "edit") {
        modalEdit.value = true;
        selected.value = index;
    } else if (modal == "delete") {
        modalDelete.value = true;
        selected.value = index;
    }
};

const closeModal = () => {
    modalCreate.value = false;
    modalEdit.value = false;
    modalDelete.value = false;
};
</script>
<template>
    <Head title="Materi" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
            <PrimaryButton class="w-min mb-2" @click="showModal('create')">
                Tambah
            </PrimaryButton>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b"
                            v-for="(data, index) in materis"
                        >
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ data.nama }}</td>
                            <td class="px-6 py-4">{{ data.deskripsi }}</td>

                            <td class="px-6 py-4">
                                <a
                                    class="font-medium text-blue-600 hover:text-blue-900"
                                    @click="showModal('edit', index)"
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
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                        />
                                    </svg>
                                </a>
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

    <Modal :show="modalCreate" @close="closeModal">
        <Create @close="closeModal" />
    </Modal>

    <Modal :show="modalEdit" @close="closeModal">
        <Edit @close="closeModal" :materi="materis[selected]" />
    </Modal>

    <Modal :show="modalDelete" @close="closeModal">
        <Delete @close="closeModal" :materi="materis[selected]" />
    </Modal>
</template>
