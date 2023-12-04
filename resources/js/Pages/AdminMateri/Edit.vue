<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    materi: Object,
});
const form = useForm({
    id:props.materi.id,
    nama: props.materi.nama,
    deskripsi: props.materi.deskripsi,
});

const emit = defineEmits(["close"]);

const submit = () => {
    form.post(route("materi.edit"), {
        onFinish: () => emit("close"),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="nama" value="Judul Materi" />

            <TextInput
                id="nama"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nama"
                required
            />
        </div>

     
        <div class="mt-4">
            <InputLabel for="deskripsi" value="Deskripsi" />

            <TextInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.deskripsi"
                required
            />
        </div>
       

        <div class="mt-8">
            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Kirim
            </PrimaryButton>
        </div>
    </form>
</template>
