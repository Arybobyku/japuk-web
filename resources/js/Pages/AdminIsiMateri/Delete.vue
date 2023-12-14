<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    item: Object,
});
const form = useForm({
    id:props.item.id,
    judul: props.item.judul,
    sub_bab: props.item.sub_bab,
    isi: props.item.isi,
    gambar: null,
    gambarDummy: props.item.gambar,
});

const emit = defineEmits(["close"]);

const submit = () => {
    form.post(route("produk.delete"), {
        onFinish: () => emit("close"),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="m-4">
        <!-- UMKM -->

        <div class="mt-4">
            <InputLabel for="nama" value="Judul" />

            <TextInput
                id="nama"
                type="text"
                class="mt-1 block w-full"
                v-model="form.judul"
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
            <SecondaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Hapus
            </SecondaryButton>
        </div>
    </form>
</template>
