<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <section>
            <div
                class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
            >
                <div
                    class="w-full bg-white rounded-lg shadow sm:max-w-md xl:p-0"
                >
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl"
                        >
                            Sign in to your account
                        </h1>
                        <form
                            @submit.prevent="submit"
                            class="space-y-4 md:space-y-6"
                            action="#"
                        >
                            <div>
                                <InputLabel for="email" value="Email" />

                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="password" value="Password" />

                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="">
                                    <label class="flex items-center">
                                        <Checkbox
                                            name="remember"
                                            v-model:checked="form.remember"
                                        />
                                        <span class="ml-2 text-sm text-gray-600"
                                            >Remember me</span
                                        >
                                    </label>
                                </div>
                                <a
                                    href="#"
                                    class="text-sm font-medium text-indigo-600 hover:underline"
                                    >Forgot password?</a
                                >
                            </div>
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Log in
                            </PrimaryButton>
                            <p class="text-sm font-light text-gray-500">
                                Don’t have an account yet?
                                <a
                                    :href="route('register')"
                                    class="font-medium text-indigo-600 hover:underline"
                                    >Sign up</a
                                >
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
