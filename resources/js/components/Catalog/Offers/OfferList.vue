<template>

    <div class="flex items-center justify-between text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        <h6>{{ t('offers.title') }}</h6>
        <button
            type="button"
            @click="startAddNewOffer"
            v-if="editingOfferIndex === null"
            class="bg-emerald-500 text-white active:bg-emerald-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
        >
            {{ t('offers.add') }}
        </button>
    </div>

    <div v-if="editingOfferIndex !== null" class="bg-white border border-blueGray-200 p-6 mb-6 rounded-lg">
        <h6 class="text-blueGray-700 text-md font-bold mb-4">
            {{ editingOfferIndex === form.offers.length ? t('offers.add') : t('offers.edit', { number: editingOfferIndex + 1 }) }}
        </h6>
        <div class="flex flex-wrap -mx-1">
            <div class="md:w-6/12 xl:w-4/12 px-1">
                <Select
                    name="size"
                    :options="availableSizes"
                    v-model="currentOffer.size"
                    :error="currentOfferErrors.size"
                />
            </div>
            <div class="md:w-6/12 xl:w-4/12 px-1">
                <Select
                    name="color"
                    :options="availableColors"
                    v-model="currentOffer.color"
                    :error="currentOfferErrors.color"
                />
            </div>
            <div class="md:w-6/12 xl:w-4/12 px-1">
                <Input
                    name="quantity"
                    type="number"
                    autocomplete="off"
                    v-model.number="currentOffer.quantity"
                    :error="currentOfferErrors.quantity"
                />
            </div>
            <div class="md:w-6/12 xl:w-4/12 px-1">
                <Input
                    name="price"
                    type="number"
                    autocomplete="off"
                    v-model.number="currentOffer.price"
                    :error="currentOfferErrors.price"
                />
            </div>
            <div class="md:w-6/12 xl:w-4/12 px-1">
                <Input
                    name="priceDiscount"
                    type="number"
                    autocomplete="off"
                    v-model.number="currentOffer.priceDiscount"
                    :error="currentOfferErrors.priceDiscount"
                />
            </div>
            <div class="w-full md:w-6/12 xl:w-4/12 px-1 flex items-center mb-3 pt-6">
                <Checkbox
                    name="activeOffer"
                    v-model="currentOffer.active"
                    :error="currentOfferErrors.active"
                />
            </div>
            <div class="w-full lg:w-6/12 px-1 mb-3">
                <Image
                    name="imageOffer"
                    :imagePreview="currentOffer.imagePreview"
                    v-model="currentOffer.image"
                    :error="currentOfferErrors.image"
                />
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button
                type="button"
                @click="saveOffer"
                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 mr-2"
            >
                {{ t('offers.save') }}
            </button>
            <button
                type="button"
                @click="cancelOfferEdit"
                class="bg-blueGray-500 text-black-50 active:bg-blueGray-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
            >
                {{ t('offers.cancel') }}
            </button>
        </div>
    </div>

    <div v-if="form.offers.length > 0 && editingOfferIndex === null" class="mt-6">
        <div class="shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-blueGray-500">
                <thead class="text-xs text-blueGray-700 uppercase bg-blueGray-50">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">{{ t('offers.size') }} / {{ t('offers.color') }}</th>
                    <th scope="col" class="px-6 py-3">{{ t('offers.price') }}</th>
                    <th scope="col" class="px-6 py-3">{{ t('offers.quantity') }}</th>
                    <th scope="col" class="px-6 py-3">{{ t('offers.active') }}</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(offer, index) in form.offers" :key="offer.id" class="bg-white border-b hover:bg-blueGray-50">
                    <td class="px-6 py-4">
                        <img v-if="offer.imagePreview" :src="offer.imagePreview" alt="Offer image" class="w-10 h-10 object-cover rounded-full"/>
                        <div v-else class="w-10 h-10 bg-blueGray-200 rounded-full flex items-center justify-center text-blueGray-400 text-xs">No img</div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-blueGray-900 whitespace-nowrap">
                        {{ getOptionName(availableSizes, offer.size) }} / {{ getOptionName(availableColors, offer.color) }}
                    </th>
                    <td class="px-6 py-4">
                        <div v-if="offer.priceDiscount">
                            {{ offer.priceDiscount }}
                            <span class="line-through text-red-500 ml-1">{{ offer.price }}</span>
                        </div>
                        <div v-else>
                            {{ offer.price }}
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ offer.quantity }}</td>
                    <td class="px-6 py-4">
                                    <span :class="{'text-emerald-500': offer.active, 'text-red-500': !offer.active}">
                                        {{ offer.active ? t('offers.yes') : t('offers.no') }}
                                    </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="relative inline-block text-left z-initial">
                            <div>
                                <button type="button" @click="toggleDropdown(index)" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-blueGray-700 hover:bg-blueGray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blueGray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>

                            <div v-if="openDropdownIndex === index" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-100" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="#" @click.prevent="startEditOffer(index)" class="text-blueGray-700 block px-4 py-2 text-sm hover:bg-blueGray-100" role="menuitem" tabindex="-1">{{ t('offers.edit') }}</a>
                                    <a href="#" @click.prevent="deleteOffer(index)" class="text-red-700 block px-4 py-2 text-sm hover:bg-blueGray-100" role="menuitem" tabindex="-1">{{ t('offers.delete') }}</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div v-if="form.offers.length === 0 && editingOfferIndex === null" class="text-blueGray-500 text-center py-4">
        {{ t('offers.noYet') }}
    </div>
</template>

<script setup>
import {useI18n} from 'vue-i18n'
import {reactive, ref} from "vue";

import Input from '../../Form/Element/Input.vue'
import Checkbox from '../../Form/Element/Checkbox.vue'
import Select from "../../Form/Element/Select.vue";
import Image from "../../Form/Element/Image.vue";

const form = reactive({
    offers: [
        {
            id: 1,
            size: 's',
            color: 'red',
            price: 1500,
            priceDiscount: 1200,
            quantity: 5,
            active: true,
            image: 'https://png.pngtree.com/thumb_back/fh260/background/20230610/pngtree-picture-of-a-blue-bird-on-a-black-background-image_2937385.jpg',
            imagePreview: 'https://png.pngtree.com/thumb_back/fh260/background/20230610/pngtree-picture-of-a-blue-bird-on-a-black-background-image_2937385.jpg',
        }
    ],
});

// Фиктивные данные для селектов (в реальном проекте будут приходить с сервера)
const availableSizes = ref([
    {id: 's', name: 'S'},
    {id: 'm', name: 'M'},
    {id: 'l', name: 'L'},
    {id: 'xl', name: 'XL'},
]);

const availableColors = ref([
    {id: 'red', name: 'Красный'},
    {id: 'blue', name: 'Синий'},
    {id: 'green', name: 'Зеленый'},
    {id: 'black', name: 'Черный'},
]);

// Состояние для управления формой добавления/редактирования предложения
const editingOfferIndex = ref(null); // null = нет редактирования, form.offers.length = новое предложение, index = редактирование существующего
const currentOffer = reactive({ // Данные текущего редактируемого/добавляемого предложения
    id: null,
    size: '',
    color: '',
    price: null,
    priceDiscount: null,
    quantity: null,
    active: true,
    image: null,
    imagePreview: null,
});
const currentOfferErrors = reactive({ // Ошибки для текущего редактируемого/добавляемого предложения
    size: '',
    color: '',
    price: '',
    priceDiscount: '',
    quantity: '',
    active: '',
    image: '',
});

const openDropdownIndex = ref(null); // Состояние для открытия/закрытия дропдаунов

const toggleDropdown = (index) => {
    if (openDropdownIndex.value === index) {
        openDropdownIndex.value = null; // Закрыть, если уже открыто
    } else {
        openDropdownIndex.value = index; // Открыть
    }
};

const getOptionName = (options, id) => {
    const option = options.find(o => o.id === id);
    return option ? option.name : '';
};

// Валидация предложения
const validateCurrentOffer = () => {
    let isValid = true;
    currentOfferErrors.size = '';
    currentOfferErrors.color = '';
    currentOfferErrors.price = '';
    currentOfferErrors.quantity = '';

    if (!currentOffer.size) {
        currentOfferErrors.size = t('validation.required');
        isValid = false;
    }
    if (!currentOffer.color) {
        currentOfferErrors.color = t('validation.required');
        isValid = false;
    }
    if (currentOffer.price === null || currentOffer.price < 0) {
        currentOfferErrors.price = t('validation.price');
        isValid = false;
    }
    if (currentOffer.quantity === null || currentOffer.quantity < 0) {
        currentOfferErrors.quantity = t('validation.quantity');
        isValid = false;
    }
    if (currentOffer.priceDiscount < 0 || currentOffer.priceDiscount > currentOffer.price) {
        currentOfferErrors.priceDiscount = t('validation.priceDiscount');
        isValid = false;
    }
    return isValid;
};

// Начать добавление нового предложения
const startAddNewOffer = () => {
    editingOfferIndex.value = form.offers.length; // Используем длину массива как индикатор нового
    Object.assign(currentOffer, { // Очищаем форму для нового предложения
        id: Date.now(), // Простой уникальный ID для нового предложения
        size: '',
        color: '',
        price: 0,
        priceDiscount: null,
        quantity: 0,
        active: true,
        image: null,
        imagePreview: null,
    });
    Object.assign(currentOfferErrors, { // Очищаем ошибки
        size: '', color: '', price: '', priceDiscount: '', quantity: '', active: '', image: ''
    });
};

// Начать редактирование существующего предложения
const startEditOffer = (index) => {
    openDropdownIndex.value = null; // Закрыть дропдаун
    editingOfferIndex.value = index;
    Object.assign(currentOffer, JSON.parse(JSON.stringify(form.offers[index])));
    Object.assign(currentOfferErrors, { // Очищаем ошибки
        size: '', color: '', price: '', priceDiscount: '', quantity: '', active: '', image: ''
    });
};

// Сохранить или обновить предложение
const saveOffer = () => {
    if (!validateCurrentOffer()) {
        return;
    }

    if (currentOffer.image) {
        currentOffer.imagePreview = URL.createObjectURL(currentOffer.image);
    }

    if (editingOfferIndex.value === form.offers.length) { // Это новое предложение
        form.offers.push({...currentOffer});
    } else { // Это существующее предложение
        Object.assign(form.offers[editingOfferIndex.value], currentOffer);
    }
    editingOfferIndex.value = null; // Закрыть форму редактирования/добавления
};

// Отменить редактирование/добавление
const cancelOfferEdit = () => {
    editingOfferIndex.value = null;
    Object.assign(currentOfferErrors, { // Очищаем ошибки
        size: '', color: '', price: '', priceDiscount: '', quantity: '', active: '', image: ''
    });
};

// Удалить предложение из списка
const deleteOffer = (index) => {
    openDropdownIndex.value = null;
    if (confirm(t('offers.confirmDelete'))) {
        form.offers.splice(index, 1);
    }
};

const {t} = useI18n({
    messages: {
        ru: {
            title: "Создать товар",
            buttonCreate: "Создать",
            titleBlockBase: "Основная информация",
            mainImage: "Основное изображение",
            error: "Что-то пошло не так!",
            exception: "Произошла непредвиденная ошибка:",
            offers: {
                title: "Предложения товара",
                add: "Добавить предложение",
                noYet: "Предложений пока нет. Нажмите 'Добавить предложение', чтобы создать первое.",
                number: "Предложение #{number}",
                delete: "Удалить",
                size: "Размер",
                color: "Цвет",
                selectSize: "Выберите размер",
                selectColor: "Выберите цвет",
                price: "Цена",
                discountPrice: "Цена со скидкой",
                quantity: "Остаток",
                image: "Изображение",
                save: "Сохранить",
                cancel: "Отмена",
                confirmDelete: "Вы уверены, что хотите удалить это предложение?",
                edit: "Редактировать",
                yes: "Да",
                no: "Нет",
                active: "Активность",
            },
            removeImage: "Удалить изображение",
            validation: {
                required: "Обязательное поле",
                price: "Цена должна быть положительной",
                priceDiscount: "Скидочная цена должна быть меньше обычной",
                quantity: "Остаток не может быть отрицательным",
            }
        },
        en: {}
    }
})
</script>
