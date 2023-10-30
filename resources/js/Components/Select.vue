<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';

const props = defineProps({
    value: {
        type: String,
        default: '',
    },
    options: {
        type: Array,
        required: true,
    },
});

const emits = defineEmits();

const selectedOption = ref(props.value);

watch(selectedOption, (newValue) => {
    emits('update:value', newValue);
});
</script>

<template>
    <select v-model="selectedOption" class="rounded p-2">
        <option value="" disabled>Виберіть опцію</option>
        <option v-for="option in options" :value="option.value" :key="option.value">{{ option.label }}</option>
    </select>
</template>

<style scoped>

</style>
