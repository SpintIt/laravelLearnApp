<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @foreach($products as $product)
        <x-catalog.item :product="$product" />
    @endforeach

</div>
