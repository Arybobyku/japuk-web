<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Modal from "@/Components/Modal.vue";
// import Create from "./Create.vue";
// import Edit from "./Edit.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Pagination from "@/Components/Pagination.vue";
import Delete from "./Delete.vue";
import { ref } from "vue";

const props = defineProps({
    items: Array,
    materis: Array,
});

const modalDelete = ref(false);



const closeModal = () => {
    modalEdit.value = false;
    modalDelete.value = false;
};
const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('isimateri.delete', id));
    }
}
</script>
<template>
    <Head title="Materi" />

    <AuthenticatedLayout>
        <div class="mx-20 my-10">
            <Link
                class="w-min bg-sky-800 p-3 rounded-md mb-8 text-white"
                :href="route('isimateri.create')"
            >
                Tambah
            </Link>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Judul Materi</th>
                            <th scope="col" class="px-6 py-3">Sub Bab</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in items.data" :key="item.id">
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ item.judul }}</td>
                            <td class="px-6 py-4">{{ item.sub_bab }}</td>

                            <td class="px-6 py-4">
                                <a
                                    class="font-medium text-blue-600 hover:underline"
                                    :href="route('isimateri.edit', item.id)"
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
                                <Button
                                    class="font-medium text-red-600 hover:text-red-900"
                                    @click="destroy(item.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                        />
                                    </svg>
                                </Button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :links="items.links" />
        </div>
    </AuthenticatedLayout>

    <Modal :show="modalCreate" @close="closeModal">
        <Create @close="closeModal" :materis="[materis]" />
    </Modal>

   
</template>
