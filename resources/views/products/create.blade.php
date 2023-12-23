<x-layouts.main title="Product Create">
    <div class="relative overflow-x-auto">
        <section class="flex items-end justify-end">
            <a href="{{ route('product.index') }}" class="border px-4 py-2">Back</a>
        </section>
    </div>
    <hr class="my-4">
    <div class="relative overflow-x-auto">
        <form action="{{ route('product.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="space-y-3">
                <div class="flex w-full flex-col">
                    <label for="title">Product Title</label>
                    <input type="text" name="title" id="title" placeholder="Product Title" value="{{ old('title') }}">
                    <x-_errors :messages="$errors->get('title')" />
                </div>
                <div class="flex w-full flex-col">
                    <label for="desc">Product Desc</label>
                    <input type="text" name="desc" id="desc" placeholder="Product Desc" value="{{ old('desc') }}">
                    <x-_errors :messages="$errors->get('desc')" />
                </div>
                <div class="flex w-full flex-col">
                    <label for="stock">Product Stock</label>
                    <input type="number" name="stock" id="stock" placeholder="Product Stock" value="{{ old('stock') }}">
                    <x-_errors :messages="$errors->get('stock')" />
                </div>
                <div class="flex w-full flex-col">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" id="price" placeholder="Product Price" value="{{ old('price') }}">
                    <x-_errors :messages="$errors->get('price')" />
                </div>
                <div class="flex w-full flex-col">
                    <button class="border px-4 py-2" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.main>
