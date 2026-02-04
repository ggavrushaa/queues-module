<?php

namespace App\Http\Controllers;

use App\Jobs\IncrementProductViewCountJob;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Request $request, Product $product)
    {
        dispatch(new IncrementProductViewCountJob($product->id, $request->ip()));

        return $product->toArray();
    }
}