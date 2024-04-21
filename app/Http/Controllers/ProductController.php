<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $product;
    public $categories;
    public function __construct()
    {
        $this->product = new Product();
        $this->categories = Category::get();
    }
    public function index()
    {
        if (request()->has('search')) {
            $products = Product::query()
                ->with('category')
                ->where('name', 'like', '%' . request()->search . '%')
                ->simplePaginate(4);
        } else {
            $products = Product::query()
                ->with('category')
                ->latest()
                ->simplePaginate(4);
        }

        Cache::set('products', $products);
        return view('product.index', [
            'products' => $products,
            'categories' => $this->categories,
        ]);
    }
    public function create()
    {
        return view('product.form-control', [
            'categories' => $this->categories,
            'product' => new Product(),
            'page_meta' => [
                'button_text' => 'Create',
                'url' => route('products.store'),
                'method' => 'POST',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $attributes = $request->validated();
        if ($request->has('image')) {
            $image = $request->file('image')->store('images/products');
            $attributes['image'] = $image;
        }
        $attributes['sell_price'] = $this->product->countSellPrice($attributes['buy_price']);
        Product::create($attributes);
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.form-control', [
            'product' => $product,
            'categories' => $this->categories,
            'page_meta' => [
                'button_text' => 'Edit',
                'url' => route('products.update', $product),
                'method' => 'PUT',
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $attributes = $request->validated();
        $attributes['sell_price'] = $this->product->countSellPrice($request->buy_price);
        if ($request->has('image')) {
            Storage::delete($product->image);
            $image = $request->image->store('images/products');
        } else {
            $image = $product->image;
        }
        $attributes['image'] = $image;
        $product->update($attributes);
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::delete($product->image);
        return to_route('products.index');
    }

    public function delete(Request $request)
    {
        $product = Product::whereId($request->product)->first();
        Storage::delete($product->image);
        $product->delete();
        return to_route('products.index');
    }
}
