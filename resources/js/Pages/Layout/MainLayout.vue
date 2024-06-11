<template>
<div class="font-nunito">
    <div class="flex flex-row min-h-screen">
        <div class="w-56 bg-gradient-to-b from-primary to-primary-dark p-4 text-white">
            <!-- Title -->
            <div class="flex items-center justify-center gap-4">
                <img src="/images/app_icon.svg" alt="app icon" class="-rotate-12 w-[2.05rem] h-[2.05rem]">
                <div class="font-extrabold text-center text-base">
                    <p>SINVENT</p>
                </div>
            </div>
            <div class="line"></div>
            <Link :href="route('dashboard')" class="w-full flex items-center gap-2" id="dashboard" :class="[ route().current('dashboard') ? 'opacity-100' : 'opacity-50' ]">
                <img src="/images/dashboard_icon.svg" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Dashboard</p>
            </Link>
            <div class="line"></div>
            <p class="opacity-50">Manajemen</p>
            <Link :href="route('category.index')" class="w-full flex items-center gap-2 mt-8" id="kategori" :class="[ route().current('category.*') ? 'opacity-100' : 'opacity-50' ]">
                <img src="/images/kategori_icon.svg" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Kategori</p>
            </Link>
            <Link :href="route('item.index')" class="w-full flex items-center gap-2 mt-8" id="barang" :class="[ route().current('item.*') ? 'opacity-100' : 'opacity-50' ]">
                <img src="/images/barang_icon.svg" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Barang</p>
            </Link>
            <Link :href="route('item-in.index')" class="w-full flex items-center gap-2 mt-8" id="barangMasuk" :class="[ route().current('item-in.*') ? 'opacity-100' : 'opacity-50' ]">
                <img src="/images/barang_masuk_icon.svg" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Barang Masuk</p>
            </Link>
            <Link :href="route('item-out.index')" class="w-full flex items-center gap-2 mt-8" id="barangKeluar" :class="[ route().current('item-out.*') ? 'opacity-100' : 'opacity-50' ]">
                <img src="/images/barang_keluar_icon.svg" alt="dashboard icon" class="h-3.5 w-3.5">
                <p class="font-bold text-sm">Barang Keluar</p>
            </Link>
        </div>
        <div class="flex-grow flex flex-col">
            <div class="w-full shadow-lg h-[70px] py-2 px-8 flex items-center justify-between">
                <div class="w-[400px] h-[38px] rounded-md overflow-hidden flex">
                    <input type="text" placeholder="search for..." class="flex-grow bg-admin-gray py-1.5 px-3 rounded-l-lg focus:border-2 focus:border-blue-200">
                    <div class="w-10 h-full bg-primary rounded-r-lg flex items-center justify-center">
                        <img src="/images/search_icon.svg" alt="search" class="w-3.5">
                    </div>`
                </div>
                <div class="flex h-full items-center">
                    <div class="flex gap-8">
                        <img src="/images/bell_icon.svg" alt="notification" class="opacity-25 w-4">
                        <img src="/images/mail_icon.svg" alt="mail" class="opacity-25 w-4">
                    </div>
                    <div class="bg-black opacity-15 h-3/4 w-[2px] mx-4"></div>
                    <div class="flex items-center gap-4" @click="isDroppedDown = !isDroppedDown">
                        <p>{{user.name}}</p>
                        <div class="w-8 aspect-square rounded-full">
                            <img src="/images/undraw_profile.svg" alt="profile" class="w-full h-full">
                        </div>
                    </div>
                    <div v-if="isDroppedDown" class="bg-white px-4 py-2 rounded-lg border-2 cursor-pointer absolute z-50 right-10 top-16 hover:text-admin-danger">
                        <Link :href="route('logout')" method="POST">Logout</Link>
                    </div>
                </div>
            </div>
            <div class="h-6 bg-gradient-to-t from-gray-100 to-gray-200"></div>
            <div class="px-6 pb-8 bg-gray-100 flex-grow">
                <slot></slot>
            </div>
        </div>
    </div>
</div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

const page = usePage()

const user = computed(() => page.props.auth.user)

const isDroppedDown = ref(false)
</script>
