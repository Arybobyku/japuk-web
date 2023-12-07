<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SelectInput from "@/Components/SelectInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
const props = defineProps({
    isimateri: Object,
    materis: Array,

});
const form = useForm({
    id: props.isimateri.id,
    id_materi: props.isimateri.id_materi,
    sub_bab: props.isimateri.sub_bab,
    isi: props.isimateri.isi,
});

const submit = () => {
    form.post(route('isimateriEdit'), {
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
                <select-input v-model="form.id_materi" class=" w-full lg:w-1/2">
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
                <InputLabel for="image" value="Gambar" />

                <td class="px-6 py-4">
                    <img class="object-fill h-20 w-20" :src="form.gambarDummy" />
                </td>

                <TextInput
                    id="image"
                    type="file"
                    class="mt-1 block w-full"
                    @input="form.image = $event.target.files[0]"
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
