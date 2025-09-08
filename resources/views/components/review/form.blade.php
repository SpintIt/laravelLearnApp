<form method="POST" class="space-y-4" {{ $attributes }}>
    @csrf
    <x-form.element.hidden name="user_id" :value="auth()->id()" />
    <x-form.element.input :title="__('Ваше имя')" name="name" />
    <x-form.element.textarea :title="__('Ваш отзыв')" name="description" />
    <x-form.element.checkbox :title="__('Согласен на обработку моих персональных данных')" name="data-consent" />
    <x-form.element.button class="justify-end" :title="__('Отправить отзыв')" name="data-consent" />
</form>
