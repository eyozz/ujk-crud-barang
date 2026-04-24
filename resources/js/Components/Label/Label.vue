<template>
    <label class="font-medium text-gray-700">
        {{ text }}
    </label>
</template>

<script setup>
defineProps({
    text: String
});
</script>
