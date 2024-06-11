<template>
    <p class="text-[28px] opacity-60">Dashboard</p>
    <div class="flex gap-16 px-16 py-4">
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-primary font-bold">Kategori</p>
                <p class="text-3xl">{{props.categoriesCount}}</p>
            </div>
            <img src="/images/kategori_icon_black.svg" alt="kategori icon" class="opacity-25 w-8">
        </div>
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-green-500 font-bold">Barang</p>
                <p class="text-3xl">{{props.itemsCount}}</p>
            </div>
            <img src="/images/barang_icon_black.svg" alt="barang icon" class="opacity-25 w-8">
        </div>
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-yellow-500 font-bold">Barang Masuk</p>
                <p class="text-3xl">{{props.itemInsCount}}</p>
            </div>
            <img src="/images/barang_masuk_icon_black.svg" alt="barang masuk icon" class="opacity-25 w-8">
        </div>
        <div class="card flex gap-8 flex-grow justify-between">
            <div>
                <p class="text-cyan-500 font-bold">Barang Keluar</p>
                <p class="text-3xl">{{props.itemOutsCount}}</p>
            </div>
            <img src="/images/barang_keluar_icon_black.svg" alt="barang keluar icon" class="opacity-25 w-8">
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    'categoriesCount': Number,
    'itemsCount': Number,
    'itemInsCount': Number,
    'itemOutsCount': Number,
})
</script>
