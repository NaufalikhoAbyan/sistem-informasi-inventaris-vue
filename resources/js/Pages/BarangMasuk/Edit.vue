<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('item-in.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Edit Barang Masuk</p>
    </div>

    <form @submit.prevent="form.put(route('item-in.update', props.itemIn.id))">
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Tanggal Masuk</p>
                <input type="date" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="in_date" v-model="form.in_date">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Kuantitas</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="in_quantity" v-model="form.in_quantity">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Item Id</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="item_id" v-model="form.item_id" disabled>
                    <option value="" disabled selected>Pilih Barang</option>
                    <option v-for="item in props.items" :key="item.id" :value="item['id']">{{item['brand']}} {{item['series']}}</option>
                </select>
            </div>
            <button type="submit" class="button-primary w-fit">Edit</button>
            <div v-if="form.errors">
                <div class="text-admin-danger font-bold" v-for="error in form.errors">
                    {{error}}
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    'itemIn': Object,
    'items': Object
})

const form = useForm({
    'in_date': props.itemIn.in_date,
    'in_quantity': props.itemIn.in_quantity,
    'item_id': props.itemIn.item_id,
})
</script>
