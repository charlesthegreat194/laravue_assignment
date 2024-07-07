<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="border border-black p-3 w-72 bg-slate-900 text-gray-300 focus:border-black dark:focus:border-black focus:ring-semiblack-0 dark:focus:ring-semiblack-0 rounded-md shadow-sm"
        v-model="model"
        ref="input" placeholder="Your email address" required
    />
</template>
