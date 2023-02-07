<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Modal from "@/Components/Modal.vue";
import Create from "./Create.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";


const props = defineProps({
    produks: Array,
});

const modalCreate = ref(false);

const showModal = (modal) => {
    if (modal === "create") {
        modalCreate.value = true;
    }
};

const closeModal = () => {
    modalCreate.value = false;
};
</script>
<template>
    <Head title="User" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
            <PrimaryButton class="w-min mb-2" @click="showModal('create')">
                Tambah
            </PrimaryButton>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Harga</th>
                            <th scope="col" class="px-6 py-3">Logo</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b"
                            v-for="(data, index) in produks"
                        >
                            <td scope="col" class="px-6 py-3">
                                <input
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    type="checkbox"
                                    :value="data.id"
                                />
                                <i class="form-icon"></i>
                            </td>
                            <td class="px-6 py-4">{{ data.name }}</td>
                            <td class="px-6 py-4">{{ data.description }}</td>
                            <td class="px-6 py-4">{{ data.harga }}</td>
                            <td class="px-6 py-4">
                                <img
                                    class="object-fill h-20 w-20"
                                    :src="data.gambar"
                                />
                            </td>
                            <td class="px-6 py-4">
                                <!-- <a
                                    class="font-medium text-blue-600 hover:underline"
                                    @click="showModalEdit"
                                    >Edit</a -->
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>

    <Modal :show="modalCreate" @close="closeModal" :max-width="xl">
        <Create />
    </Modal>
</template>
