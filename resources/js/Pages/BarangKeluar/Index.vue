<template>
    <div class="flex justify-between items-center">
        <p class="text-[28px] opacity-60">Barang Keluar</p>
        <Link :href="route('item-out.create')">
            <button class="button-primary">
                Tambah +
            </button>
        </Link>
    </div>

    <div class="border rounded-lg bg-white shadow-md mt-4">
        <div class="p-5 bg-admin-gray rounded-t-lg border-b">
            <p class="font-bold text-primary">Tabel Barang Keluar</p>
        </div>
        <div class="p-5 w-full">
            <table class="table w-full table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">No.</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Tanggal Keluar</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Kuantitas Keluar</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Barang</th>
                    <th class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">Action</th>
                </tr>
                <tr v-for="itemOut in props.itemOuts">
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{ count++ }}.</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{itemOut['out_date']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{itemOut['out_quantity']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">{{itemOut.item['brand']}} {{itemOut.item['series']}}</td>
                    <td class="px-4 py-2 text-left border-admin-gray-dark border border-opacity-50">
                        <div class="flex w-full justify-center gap-2">
                            <Link :href="route('item-out.show', itemOut.id)" class="bg-primary p-2 flex items-center rounded-lg gap-4"><img src="/images/show_icon.svg" alt="show" class="w-6"></Link>
                            <Link :href="route('item-out.edit', itemOut.id)" class="bg-admin-warning p-2 flex items-center rounded-lg gap-4"><img src="/images/edit_icon.svg" alt="edit" class="w-6"></Link>
                            <Link :href="route('item-out.destroy', itemOut.id)" method="delete" as="button" class="bg-admin-danger p-2 flex items-center rounded-lg gap-4" onclick=""><img src="/images/delete_icon.svg" alt="delete" class="w-6"></Link>
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
    'itemOuts': Object
})
</script>

