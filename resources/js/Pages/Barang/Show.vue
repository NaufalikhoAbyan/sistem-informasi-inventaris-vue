<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('item.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Lihat Barang</p>
    </div>

    <div class="flex gap-4 h-fit">
        <div class="card flex flex-col gap-4">
            <div>
                <p class="text-primary font-bold">Merk</p>
                <p class="text-2xl">{{props.item['brand']}}</p>
            </div>
            <div>
                <p class="text-primary font-bold">Seri</p>
                <p class="text-2xl">{{props.item['series']}}</p>
            </div>
            <div>
                <p class="text-primary font-bold">Spesifikasi</p>
                <p class="text-2xl">{{props.item['specification']}}</p>
            </div>
            <div>
                <p class="text-primary font-bold">Stok</p>
                <p class="text-2xl">{{props.item['stock']}}</p>
            </div>
            <div>
                <p class="text-primary font-bold">Kategori</p>
                <p class="text-2xl">({{props.item.category['category']}}) {{props.item.category['description']}}</p>
            </div>
        </div>
        <div v-if="props.item.item_image">
            <div class="card flex flex-col gap-4">
                <p class="text-primary font-bold">Gambar</p>
                <img :src="'/storage/images/' + props.item.item_image.filename" alt="item image" class="w-48">
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    'item': Object
})
</script>
