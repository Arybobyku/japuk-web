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
                        <tr class="bg-white border-b" v-for="(data, index) in materis">

                            <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ data.nama }}</td>
                            <td class="px-6 py-4">{{ data.deskripsi }}</td>
                          
                            <td class="px-6 py-4">
                                <a class="font-medium text-blue-600 hover:underline" @click="showModal('edit', index)">Edit
                                </a>
                                <a class="font-medium text-red-600 hover:underline" @click="showModal('delete')">Hapus
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
