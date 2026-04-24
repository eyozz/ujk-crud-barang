<template>
    <input 
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :placeholder="placeholder"
        type="date" 
        class="input input-bordered w-full focus:input-primary" 
    />
</template>

<script setup>
defineProps({
    modelValue: String,
    placeholder: String
});
defineEmits(['update:modelValue']);
</script>