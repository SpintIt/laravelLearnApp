<template>
    <div class="relative w-full mb-4">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" :for="name">
            {{ title }}
        </label>
        <input
            type="text"
            :id="name"
            :name="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            :placeholder="title"
            autocomplete="off"
        />
        <error :message="errorMessage"/>
    </div>
</template>

<script>
import Error from "./Error.vue";

export default {
    components: {Error},
    data() {
        return {
        };
    },
    props: {
        modelValue: {
            type: String,
            default: '',
        },
        title: {
            type: String,
            default: '',
        },
        name: {
            type: String,
            default: '',
        },
        error: {
            type: [String, Array],
            default: '',
        },
    },
    computed: {
        errorMessage() {
            if (Array.isArray(this.error)) {
                return this.error.join(', ');
            }

            return this.error;
        },
    },
};
</script>
