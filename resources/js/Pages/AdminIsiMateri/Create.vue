<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SelectInput from "@/Components/SelectInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    id_materi: "",
    sub_bab: "",
    gambar: "",
    isi: "",
});
const props = defineProps({
    materis: Array,

});
const submit = () => {
    form.post(route('isimateri'), {
        onFinish: () => redirect('isimateri'),
    });
};
</script>

<template>
    <Head title="Create" />

    <AuthenticatedLayout>
        <form @submit.prevent="submit" class="m-4">
            <!-- UMKM -->
            <div class="mt-4">
                <InputLabel for="nama" value="Judul Materi" />
                <select-input v-model="form.id_materi" class=" w-full lg:w-1/2" >
                    <option :value="null" />
                    <option v-for="materi in materis" :key="materi.id" :value="materi.id">{{ materi.nama }}</option>
                </select-input>

            </div>

            <div class="mt-4">
                <InputLabel for="nama" value="Sub Bab" />

                <TextInput id="sub_bab" name="sub_bab" type="text" class="mt-1 block w-full lg:w-1/2" v-model="form.sub_bab"
                    required />
            </div>
            <div class="mt-4">
                <InputLabel for="gambar" value="Gambar Produk" />

                <TextInput
                    id="gambar"
                    type="file"
                    class="mt-1 block w-full"
                    @input="form.gambar = $event.target.files[0]"
                    required
                />
            </div>

            <div class="mt-4">
                <InputLabel for="deskripsi" value="Isi" />

                <TextInput id="deskripsi" type="text" class="mt-1 block w-full lg:w-1/2" v-model="form.isi" required />
            </div>


            <div class="mt-8">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Kirim
                </PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
