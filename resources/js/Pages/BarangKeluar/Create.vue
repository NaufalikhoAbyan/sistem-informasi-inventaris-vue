<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('item-out.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Tambah Barang Keluar</p>
    </div>

    <form @submit.prevent="form.post(route('item-out.store'))">
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Tanggal Keluar</p>
                <input type="date" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="out_date" v-model="form.out_date">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Kuantitas</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="out_quantity" v-model="form.out_quantity">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Item Id</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="item_id" v-model="form.item_id">
                    <option value="" disabled selected>Pilih Barang</option>
                    <option v-for="item in props.items" :key="item.id" :value="item['id']">{{item['brand']}} {{item['series']}}</option>
                </select>
            </div>
            <button type="submit" class="button-primary w-fit">Tambah</button>
            <div v-if="form.errors">
                <div class="text-admin-danger font-bold" v-for="error in form.errors">
                    {{error}}
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";

const props = defineProps({
    'items': Object
})

const form = useForm({
    'out_date': new Date().toISOString().substring(0, 10),
    'out_quantity': 0,
    'item_id': '',
})
</script>
