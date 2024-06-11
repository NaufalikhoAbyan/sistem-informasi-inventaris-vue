<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('category.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Lihat Kategori</p>
    </div>
    <div class="card flex flex-col gap-4">
        <div>
            <p class="text-primary font-bold">Deskripsi</p>
            <p class="text-2xl">{{ props.category.description }}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Kategori</p>
            <p class="text-2xl">{{ changeCategory(props.category.category) }}</p>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    'category': Object
})

function changeCategory(category){
    switch (category) {
        case 'A':
            return "Alat";
        case 'M':
            return "Modal";
        case 'BHP':
            return "Barang Habis Pakai";
        case 'BTHP':
            return "Barang Tidak Habis Pakai";
    }
}
</script>
