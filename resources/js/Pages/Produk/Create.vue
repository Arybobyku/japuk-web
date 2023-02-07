<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Container } from "postcss";

const form = useForm({
    nama: "",
    desription: "",
    harga: "",
    logo: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="nama_umkm" value="Nama Umkm" />

            <TextInput
                id="nama_umkm"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nama"
                required
            />
        </div>

        <div class="mt-4">
            <InputLabel for="logo" value="Logo Umkm" />

            <TextInput
                id="logo"
                type="file"
                class="mt-1 block w-full"
                @input="form.logo = $event.target.files[0]"
                required
            />
        </div>
        <div class="mt-4">
            <InputLabel for="alamat" value="Alamat" />

            <TextInput
                id="alamat"
                type="text"
                class="mt-1 block w-full"
                v-model="form.alamat"
                required
            />
        </div>
        <div class="mt-4">
            <InputLabel for="noHp" value="No Handphone" />

            <TextInput
                id="noHp"
                type="number"
                class="mt-1 block w-full"
                v-model="form.noHp"
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
