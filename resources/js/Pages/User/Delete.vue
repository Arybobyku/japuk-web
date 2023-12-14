<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    user: Object,
});
const form = useForm({
    id:props.user.id,
    name: props.user.name,
    email: props.user.email,
});

const emit = defineEmits(["close"]);

const submit = () => {
    form.post(route("user.delete"), {
        onFinish: () => emit("close"),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="name" value="Nama User" />

            <TextInput
                id="nama"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                 readonly
            
            />
        </div>

                <div class="mt-4">
                <InputLabel for="email" value="Email User" />

                <TextInput
                    id="email"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    readonly
            
                />
            </div>
     

        <div class="mt-8">
            <SecondaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Hapus
            </SecondaryButton>
        </div>
    </form>
</template>
