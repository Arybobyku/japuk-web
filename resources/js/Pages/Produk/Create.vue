<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    nama: "",
    deskripsi: "",
    harga: "",
    gambar: "",
});

const emit = defineEmits(['close']);

const submit = () => {
    form.post(route('produk'),{
        onFinish: () =>  emit('close'),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="nama" value="Nama Produk" />

            <TextInput
                id="nama"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nama"
                required
            />
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
            <InputLabel for="deskripsi" value="Deskripsi" />

            <TextInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.deskripsi"
                required
            />
        </div>
        <div class="mt-4">
            <InputLabel for="harga" value="Harga" />

            <TextInput
                id="harga"
                type="number"
                class="mt-1 block w-full"
                v-model="form.harga"
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
