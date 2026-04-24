<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <main class="flex min-h-screen items-center justify-center bg-slate-100 px-6">
        <div class="rounded-2xl bg-white px-10 py-8 text-center shadow-lg">
            <h1 class="mt-4 text-4xl font-bold text-slate-900">STOK BARANG</h1>
            <div class="mt-6 flex gap-4 justify-center">
                <Link href="/login" class="rounded-lg bg-blue-600 px-5 py-2 text-white font-medium hover:bg-blue-700">
                    Login
                </Link>
                <Link href="/register" class="rounded-lg border border-blue-600 px-5 py-2 text-blue-600 font-medium hover:bg-blue-50">
                    Register
                </Link>
            </div>
        </div>
    </main>
</template>