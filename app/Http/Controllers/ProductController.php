<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::query()->where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->input('title');
        $product->desc = $request->input('desc');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->save();
        noty()->addSuccess('Kamu berhasil membuat product baru!');
        return Redirect::route('product.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function update(ProductRequest $request, string $slug)
    {
        $product = Product::query()->where('slug', $slug)->firstOrFail();
        $product->update(
            [
                $product->title = $request->input('title'),
                $product->desc = $request->input('desc'),
                $product->stock = $request->input('stock'),
                $product->price = $request->input('price')
            ]
        );
        noty()->addSuccess('Kamu berhasil memperbaruhi product!');
        return Redirect::route('product.index');
    }

    public function edit(string $slug)
    {
        $product = Product::query()->where('slug', $slug)->firstOrFail();
        return view('products.edit', compact('product'));
    }

    public function destroy(string $slug)
    {
        $product = Product::query()->where('slug', $slug)->firstOrFail();
        $product->delete();
        noty()->addSuccess('Kamu berhasil menghapus product!');
        return Redirect::route('product.index');
    }
}
