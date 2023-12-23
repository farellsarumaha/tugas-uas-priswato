<x-layouts.main title="Product Edit">
    <div class="relative overflow-x-auto">
        <section class="flex justify-end items-end">
            <a href="{{ route('product.index') }}" class="border px-4 py-2">Back</a>
        </section>
    </div>
    <hr class="my-4">
    <div class="relative overflow-x-auto">
        <form action="{{ route('product.update', $product->slug) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="space-y-3">
                <div class="flex flex-col w-full">
                    <label for="title">Product Title</label>
                    <input type="text" name="title" id="title" placeholder="Product Title" value="{{ old('title', $product->title) }}">
                    <x-_errors :messages="$errors->get('title')" />
                </div>
                <div class="flex flex-col w-full">
                    <label for="desc">Product Desc</label>
                    <input type="text" name="desc" id="desc" placeholder="Product Desc" value="{{ old('desc', $product->desc) }}">
                    <x-_errors :messages="$errors->get('desc')" />
                </div>
                <div class="flex flex-col w-full">
                    <label for="stock">Product Stock</label>
                    <input type="number" name="stock" id="stock" placeholder="Product Stock" value="{{ old('stock', $product->stock) }}">
                    <x-_errors :messages="$errors->get('stock')" />
                </div>
                <div class="flex flex-col w-full">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" id="price" placeholder="Product Price" value="{{ old('price', $product->price) }}">
                    <x-_errors :messages="$errors->get('price')" />
                </div>
                <div class="flex flex-col w-full">
                    <button class="border px-4 py-2" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.main>
