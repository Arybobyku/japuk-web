<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextareaInput from "@/Components/TextareaInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    title: "",
    isi: "",
    image: "",
});

const emit = defineEmits(['close']);

const submit = () => {
    form.post(route('adminevent'),{
        onFinish: () =>  emit('close'),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="title" value="Judul Berita" />

            <TextInput
                id="nama"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                required
            />
        </div>
            <div class="mt-4">
                <InputLabel for="image" value="Gambar Berita" />

                <TextInput
                    id="image"
                    type="file"
                    class="mt-1 block w-full"
                    @input="form.image = $event.target.files[0]"
                    required
                />
            </div>
        <div class="mt-4">
            <InputLabel for="isi" value="Isi" />

            <TextareaInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.isi"
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
