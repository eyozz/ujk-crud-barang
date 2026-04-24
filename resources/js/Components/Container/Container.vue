<script setup>
defineProps({
    title: String,
});
</script>

<template>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">
        <div class="p-4 sm:p-6 lg:p-8 bg-white rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow duration-200">
            <h1 v-if="title" class="mb-3 sm:mb-4 text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-800">{{ title }}</h1>
            <hr v-if="title" class="mb-4 sm:mb-6 border-gray-200">
            <slot></slot>
        </div>
    </div>
</template>