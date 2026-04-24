<template>
    <input 
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :placeholder="placeholder"
        type="number" 
        class="input input-bordered w-full focus:input-primary" 
        min="0"
        step="any"
    />
</template>

<script setup>
defineProps({
    modelValue: [String, Number],
    placeholder: String
});
defineEmits(['update:modelValue']);
</script>