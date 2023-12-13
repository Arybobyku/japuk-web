<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextareaInput from "@/Components/TextareaInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    item: Object,
});
const form = useForm({
    id: props.item.id,
    title: props.item.title,
    isi: props.item.isi,
    gambar: null,
    gambarDummy: props.item.image,
});

const emit = defineEmits(["close"]);

const submit = () => {
    form.post(route("adminevent.delete"), {
        onFinish: () => emit("close"),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="title" value="Judul" />

            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                required
            
            />
        </div>

        <div class="mt-4">
            <InputLabel for="gambar" value="Gambar Produk" />

            <td class="px-6 py-4">
                <img class="object-fill h-20 w-20" :src="form.gambarDummy" />
            </td>

            <TextInput
                id="gambar"
                type="file"
                class="mt-1 block w-full"
                @input="form.gambar = $event.target.files[0]"
            />
        </div>
        <div class="mt-4">
            <InputLabel for="deskripsi" value="Deskripsi" />

            <TextareaInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.isi"
                required
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
