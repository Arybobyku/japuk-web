<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Container } from "postcss";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
    nama: "",
    logo: "",
    alamat: "",
    noHp: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <section>
            <div
                class="flex flex-col items-center justify-center px-6 py-8 mx-auto"
            >
                <div
                    class="w-full bg-white rounded-lg shadow "
                >
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl"
                        >
                            Sign in to your account
                        </h1>

                        <form @submit.prevent="submit">
                            <div class="flex flex-row space-x-10">
                                <div class="basis-1/2">
                                    <div>
                                        <InputLabel for="name" value="Name" />

                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.name"
                                            required
                                            autofocus
                                            autocomplete="name"
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.name"
                                        />
                                    </div>

                                    <div class="mt-4">
                                        <InputLabel for="email" value="Email" />

                                        <TextInput
                                            id="email"
                                            type="email"
                                            class="mt-1 block w-full"
                                            v-model="form.email"
                                            required
                                            autocomplete="username"
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.email"
                                        />
                                    </div>

                                    <div class="mt-4">
                                        <InputLabel
                                            for="password"
                                            value="Password"
                                        />

                                        <TextInput
                                            id="password"
                                            type="password"
                                            class="mt-1 block w-full"
                                            v-model="form.password"
                                            required
                                            autocomplete="new-password"
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.password"
                                        />
                                    </div>

                                    <div class="mt-4">
                                        <InputLabel
                                            for="password_confirmation"
                                            value="Confirm Password"
                                        />

                                        <TextInput
                                            id="password_confirmation"
                                            type="password"
                                            class="mt-1 block w-full"
                                            v-model="form.password_confirmation"
                                            required
                                            autocomplete="new-password"
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors
                                                    .password_confirmation
                                            "
                                        />
                                    </div>
                                </div>
                                <div class="basis-1/2">
                                    <div class="">
                                        <InputLabel
                                            for="nama_umkm"
                                            value="Nama Umkm"
                                        />

                                        <TextInput
                                            id="nama_umkm"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nama"
                                            required
                                        />
                                    </div>

                                    <div class="mt-4">
                                        <InputLabel
                                            for="logo"
                                            value="Logo Umkm"
                                        />

                                        <TextInput
                                            id="logo"
                                            type="file"
                                            class="mt-1 block w-full"
                                            @input="
                                                form.logo =
                                                    $event.target.files[0]
                                            "
                                            required
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel
                                            for="alamat"
                                            value="Alamat"
                                        />

                                        <TextInput
                                            id="alamat"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.alamat"
                                            required
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <InputLabel
                                            for="noHp"
                                            value="No Handphone"
                                        />

                                        <TextInput
                                            id="noHp"
                                            type="number"
                                            class="mt-1 block w-full"
                                            v-model="form.noHp"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8">
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Register
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
