<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use App\Http\Controllers\Controller;

class ClassificationController extends Controller
{
    public function index()
    {
        return view('classifications.index', [
            'title' => 'Classification',
            'slug' => 'classifications',
            'classifications' => Classification::latest()->paginate(8),
        ]);
    }

    public function store(Request $request)
    {
        $formClassification = $request->validate([
            'name' => 'required|unique:classifications',
            'code' => 'required|unique:classifications'
        ]);

        Classification::create($formClassification);
        return redirect('/classifications');
    }
}
