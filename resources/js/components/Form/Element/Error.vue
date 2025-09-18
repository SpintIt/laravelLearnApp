<template>
    <div class="text-red-500 text-xs mt-1" v-show="message">
        {{ message }}
    </div>
</template>

<script setup>

defineProps({
    message: {
        type: String,
        default: '',
    },
});
</script>
