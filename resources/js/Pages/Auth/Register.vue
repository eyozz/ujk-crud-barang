<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800">Halaman Register</h1>
            <form @submit.prevent="submit" class="mt-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" v-model="form.email" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" />
                </div>
                <div v-if="errors.email" class="text-red-600">{{ errors.email }}</div>
                
                <div class="mt-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" v-model="form.name" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" />
                </div>
                <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>

                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" v-model="form.password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" />
                </div>
                <div v-if="errors.password" class="text-red-600">{{ errors.password }}</div>

                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <input type="password" id="password_confirmation" v-model="form.password_confirmation" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" />
                </div>

                <button type="submit"
                    class="mt-6 w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition duration-150 ease-in-out">
                    Daftar
                </button>
                <p class="mt-4 text-center text-sm text-gray-600">
                    Sudah punya akun? <a href="/login" class="text-blue-600 hover:text-blue-800">Masuk disini</a>
                </p>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

defineProps({
    errors: Object
});

const form = reactive({
    email: '',
    name: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    router.post('/register', form);
};
</script>