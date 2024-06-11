<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('item.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Edit Barang</p>
    </div>

        <form @submit.prevent="form.post(route('item.update', props.item.id))" enctype="multipart/form-data">
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Gambar</p>
                <input type="file" class="text-xl p-2 w-1/4" name="image" @input="form.image = $event.target.files[0]" accept=".jpeg, .png, .jpg">
            </div>
            <div v-if="props.item.item_image">
                <div class="card flex flex-col gap-4">
                    <p class="text-primary font-bold">Gambar</p>
                    <img :src="'/storage/images/' + props.item.item_image.filename" alt="item image" class="w-48">
                </div>
                <div class="flex gap-4 my-4">
                    <input type="checkbox" id="deleteImage" v-model="form.deleteImage">
                    <label for="deleteImage">Hapus Gambar</label>
                </div>
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Merk</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="brand" v-model="form.brand">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Seri</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="series" v-model="form.series">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">spesifikasi</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="specification" v-model="form.specification">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Stok</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="stock" v-model.number="form.stock" disabled>
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Kategori</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="category_id" v-model="form.category_id">
                    <option v-for="category in props.categories" :key="category.id" :value="category.id">({{category['category']}}) {{category['description']}}</option>
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
    'item': Object,
    'categories': Object
})

const form = useForm({
    'image': null,
    'deleteImage': false,
    'brand': props.item.brand,
    'series': props.item.series,
    'specification': props.item.specification,
    'stock': props.item.stock,
    'category_id': props.item.category_id,
    '_method': 'put'
})
</script>
