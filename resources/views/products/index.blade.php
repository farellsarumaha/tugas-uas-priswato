<x-layouts.main title="Products">
    <div class="relative overflow-x-auto">
        <section class="flex items-end justify-end">
            <a href="{{ route('product.create') }}" class="border px-4 py-2">Create</a>
        </section>
    </div>
    <hr class="my-4">
    <div class="relative overflow-x-auto">
        <table class="w-full text-left text-sm rtl:text-right">
            <thead class="border text-xs uppercase text-gray-700">
                <tr>
                    <th scope="col" class="whitespace-nowrap border-r px-6 py-3 text-center">Title</th>
                    <th scope="col" class="whitespace-nowrap border-r px-6 py-3 text-center">Description</th>
                    <th scope="col" class="whitespace-nowrap border-r px-6 py-3 text-center">Stock</th>
                    <th scope="col" class="whitespace-nowrap border-r px-6 py-3 text-center">Price</th>
                    <th scope="col" class="whitespace-nowrap px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border border-t-0">
                        <td class="whitespace-nowrap border-r p-2 px-4">
                            <a href="{{ route('product.show', $product->slug) }}" class="hover:underline">{{ $product->title }}</a>
                        </td>
                        <td class="whitespace-nowrap border-r p-2 px-4">{{ $product->desc }}</td>
                        <td class="whitespace-nowrap border-r p-2 px-4">{{ $product->stock }}</td>
                        <td class="whitespace-nowrap border-r p-2 px-4">{{ $product->getPriceByFormat() }}</td>
                        <td class="whitespace-nowrap p-2 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('product.edit', $product->slug) }}" class="border px-4 py-2">Edit</a>
                                <button data-modal-target="popup-modal-{{ $product->slug }}" data-modal-toggle="popup-modal-{{ $product->slug }}" type="button" class="border px-4 py-2">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <div id="popup-modal-{{ $product->slug }}" tabindex="-1" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                        <div class="relative max-h-full w-full max-w-md p-4">
                            <div class="relative bg-white shadow">
                                <div class="p-4 space-y-4">
                                    <form action="{{ route('product.destroy', $product->slug) }}" method="post" id="{{ "delete-" . $product->slug}}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <div class="flex justify-between items-center w-full">
                                        <button data-modal-hide="popup-modal-{{ $product->slug }}" type="submit" form="{{ "delete-" . $product->slug}}" class="border px-4 py-2 bg-red-600 hover:bg-red-800 text-white">
                                            Yes, I'm sure</button>
                                        <button data-modal-hide="popup-modal-{{ $product->slug }}" type="button" class="border px-4 py-2">No, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <td class="whitespace-nowrap border-r p-2 px-4 text-center" colspan="5">Data Not Found</td>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.main>
