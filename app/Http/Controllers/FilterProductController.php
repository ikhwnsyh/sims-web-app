<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FilterProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->category_id) {
            $products = Product::query()
                ->with('category')
                ->where('category_id', $request->category_id)
                ->simplePaginate(4);
        } else {
            $products = Product::query()
                ->with('category')
                ->latest()
                ->simplePaginate(4);
        }
        return response()->json($products);
    }
}
