<template>
    <div class="flex flex-col gap-2">
        <Link :href="route('category.index')">
            <div class="opacity-25 flex text-2xl gap-2">
                <img src="/images/back_icon.svg" alt="" class="h-8">
                <p>Back</p>
            </div>
        </Link>
        <p class="text-[28px] opacity-60">Tambah Kategori</p>
    </div>

    <form @submit.prevent="form.post(route('category.store'))">
        <div class="py-4 flex flex-col gap-4">
            <div>
                <p class="opacity-75 flex text-xl font-bold">Deskripsi</p>
                <input type="text" class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="description" v-model="form.description">
            </div>
            <div>
                <p class="opacity-75 flex text-xl font-bold">Kategori</p>
                <select class="text-xl p-2 rounded-lg border border-primary-dark w-1/4" name="category" v-model="form.category">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="A">A</option>
                    <option value="M">M</option>
                    <option value="BHP">BHP</option>
                    <option value="BTHP">BTHP</option>
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
import { useForm, Link } from "@inertiajs/vue3";
const form = useForm({
    description: null,
    category: ""
})
</script>
