<template>
    <p class="text-3xl">Count: {{ count }}</p>
    <button @click="increment" class="border rounded-lg bg-blue-500 text-white p-2 active:bg-blue-700">
        Increment
    </button>
</template>

<script setup>
import { ref } from 'vue'

const count = ref(0)

function increment() {
    count.value++
}
</script>
