<x-layouts.main title="{{ $product->title }}">
    <div class="relative overflow-x-auto">
        <section class="flex items-end justify-end">
            <a href="{{ route('product.index') }}" class="border px-4 py-2">Back</a>
        </section>
    </div>
    <hr class="my-4">
    <div class="relative overflow-x-auto w-full min-h-screen flex justify-center items-center">
        <div class="block max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->title }}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Deskripsi: {{ $product->desc }}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400">Stock: {{ $product->stock }}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400">Harga: {{ $product->getPriceByFormat() }}</p>
        </div>
    </div>
</x-layouts.main>


