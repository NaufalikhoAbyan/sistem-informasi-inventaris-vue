<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('item-out.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Lihat Barang Keluar</p>
    </div>

    <div class="card flex flex-col gap-4">
        <div>
            <p class="text-primary font-bold">Deskripsi</p>
            <p class="text-2xl">{{props.itemOut['out_date']}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Kategori</p>
            <p class="text-2xl">{{props.itemOut['out_quantity']}}</p>
        </div>
        <div>
            <p class="text-primary font-bold">Barang</p>
            <p class="text-2xl">{{props.itemOut.item['brand']}} {{props.itemOut.item['series']}}</p>
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    'itemOut': Object
})
</script>
