<template>
    <div class="flex justify-between items-center">
        <p class="text-[28px] opacity-60">Barang</p>
        <Link :href="route('item.create')">
            <button class="button-primary">
                Tambah +
            </button>
        </Link>
    </div>
    <div v-if="$page.props.errors.error" class="text-admin-danger font-bold">{{ $page.props.errors.error }}</div>
    <div class="border rounded-lg bg-white shadow-md mt-4">
        <div class="p-5 bg-admin-gray rounded-t-lg border-b">
            <p class="font-bold text-primary">Tabel Barang</p>
        </div>
        <div class="p-5 w-full">
            <table class="table w-full table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">No.</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Gambar</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Merk</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Seri</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Spesifikasi</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Stok</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Kategori</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Action</th>
                </tr>
                <tr v-for="item in props.items" :key="item.id">
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{ count++ }}.</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">
                        <img v-if="item.item_image" :src="('/storage/images/' + item.item_image.filename)" alt="item image" class="w-12">
                        <div v-else>Tidak ada gambar</div>
                    </td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{item['brand']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{item['series']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{item['specification']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{item['stock']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">({{item.category.category}}) {{item.category.description}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">
                        <div class="flex w-full justify-center gap-2">
                            <Link :href="route('item.show', item.id)" class="bg-primary p-2 flex items-center rounded-lg gap-4"><img src="/images/show_icon.svg" alt="show" class="w-6"></Link>
                            <Link :href="route('item.edit', item.id)" class="bg-admin-warning p-2 flex items-center rounded-lg gap-4"><img src="/images/edit_icon.svg" alt="edit" class="w-6"></Link>
                            <Link :href="route('item.destroy', item.id)" method="delete" as="button" class="bg-admin-danger p-2 flex items-center rounded-lg gap-4" onclick=""><img src="/images/delete_icon.svg" alt="delete" class="w-6"></Link>
                        </div>
                    </td>
                </tr>
                </thead>
            </table>
            <div class="hidden">{{count = 1}}</div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const count = 1
const props = defineProps({
    'items': Object
})
</script>
