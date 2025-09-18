<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
    >
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">{{ t('title') }}</h6>
                <button
                    class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button"
                >
                    {{ t('buttonCreate') }}
                </button>
            </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <div>
                <div class="flex items-center justify-between text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    <h6>{{ t('titleBlockBase') }}</h6>
                    <div class="flex-shrink-0 ml-auto">
                        <Checkbox
                            name="active"
                            v-model="form.active"
                            :error="errors.active"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-1">
                        <Input
                            name="name"
                            v-model="form.name"
                            :error="errors.name"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 px-1">
                        <Input
                            name="code"
                            v-model="form.code"
                            :error="errors.code"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 px-1">
                        <Input
                            name="sort"
                            type="number"
                            v-model="form.sort"
                            :error="errors.sort"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 px-1">
                        <Image
                            name="image"
                            v-model="form.image"
                            :error="errors.image"
                        />
                    </div>
                    <div class="w-full lg:w-12/12 px-1">
                        <Textarea
                            name="description"
                            v-model="form.description"
                            :error="errors.description"
                        />
                    </div>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300"/>
                <OfferList/>
            </div>
        </div>
    </div>
</template>

<script setup>
import {useI18n} from 'vue-i18n'
import {reactive, ref} from "vue";

import Input from '../Form/Element/Input.vue'
import Checkbox from '../Form/Element/Checkbox.vue'
import Textarea from "../Form/Element/Textarea.vue";
import Image from "../Form/Element/Image.vue";

import OfferList from "./Offers/OfferList.vue";

const form = reactive({
    name: '',
    description: '',
    image: null,
    code: '',
    active: false,
    sort: '',
    offers: [],
});

let errors = ref({
    name: '',
    description: '',
    image: '',
    code: '',
    active: '',
    sort: '',
});

const {t} = useI18n({
    messages: {
        ru: {
            title: "Создать товар",
            buttonCreate: "Создать",
            titleBlockBase: "Основная информация",
            mainImage: "Основное изображение",
            error: "Что-то пошло не так!",
            exception: "Произошла непредвиденная ошибка:",
        },
        en: {}
    }
})
</script>
