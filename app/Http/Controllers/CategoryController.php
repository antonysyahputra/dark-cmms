<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Classification;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
        public function index()
        {
            // dd(Category::first()->orderBy('id', 'asc')->get());
            return view("categories/index", [
                "title" => "Categories",
                'slug' => 'categories',
                "categories" => Category::first()->orderBy('code')->paginate(8),
                'classifications' => Classification::all(),
            ]);
        }

        public function store(Request $request)
        {
            $formCategories = $request->validate([
                'name' => 'required|required|unique:categories',
                'code' => 'required|required|unique:categories',
                'classification_id' => 'required',
            ]);

            // dd($formCategories);

            Category::create($formCategories);
            return redirect('/categories');
        }
}
