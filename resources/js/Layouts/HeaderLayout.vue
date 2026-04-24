<script setup>
import { router } from '@inertiajs/vue3';

defineProps({
    user: Object,
});

function logout() {
    router.post('/logout');
}
</script>

<template>
    <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
        <span class="font-semibold text-gray-800">Selamat datang, {{ user?.name ?? 'Guest' }}</span>
        <button @click="logout" class="text-sm text-red-500 hover:text-red-700 font-medium">
            Logout
        </button>
    </header>
</template>