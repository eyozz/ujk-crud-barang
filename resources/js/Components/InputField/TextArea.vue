<template>
    <textarea 
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :placeholder="placeholder"
        class="textarea textarea-bordered w-full h-24 resize-none focus:textarea-primary"
        rows="3"
    ></textarea>
</template>

<script setup>
defineProps({
    modelValue: String,
    placeholder: String
});
defineEmits(['update:modelValue']);
</script>