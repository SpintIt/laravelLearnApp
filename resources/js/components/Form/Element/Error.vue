<template>
    <div class="text-red-500 text-xs mt-1" v-show="message">
        {{ message }}
    </div>
</template>

<script>
export default {
    data() {
        return {
        };
    },
    props: {
        message: {
            type: String,
            default: '',
        },
    },
};
</script>
