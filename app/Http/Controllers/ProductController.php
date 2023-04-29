<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
        {
            
            return view("products/index", [
                "title" => "Product",
                'slug' => 'products',
                "products" => Product::first()->orderBy('code')->paginate(8),
                'categories' => Category::first()->orderBy('code')->get(),
            ]);
        }

        public function show(Product $product)
        {
            return view('products.show', [
                "title" => "Product",
                'slug' => 'products',
                'product' => $product
            ]);
        }

        public function store(Request $request)
        {
            // dd($request);
            $productForm = $request->validate([
                'name' => 'required|unique:products',
                'code' => 'required|unique:products',
                'brand' => 'required',
                'specification' => 'required',
                'category_id' => 'required',
            ]);

            Product::create($productForm);
            return redirect('/products');
        }
}
