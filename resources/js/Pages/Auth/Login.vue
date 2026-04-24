<template>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold text-center mb-6 text-black">Login</h2>
            <div v-if="$page.props.flash?.success" class="mb-4 text-green-600">{{ $page.props.flash.success }}</div>
            <div v-if="errors.email" class="text-red-600">{{ errors.email }}</div>
            <div v-if="errors.password" class="text-red-600">{{ errors.password }}</div>

            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="masukkan email Anda"  v-model="form.email" >
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="masukkan password Anda" v-model="form.password">
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Login</button>
                </div>
                <p class="text-center text-sm text-gray-600">
                    Belum punya akun? <a href="/register" class="text-blue-500 hover:text-blue-700">Daftar disini</a>
                </p>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ errors: Object })

const form = reactive({
    email: null,
    password: null,
})

function submit() {
    router.post('/login', form)
}
</script>