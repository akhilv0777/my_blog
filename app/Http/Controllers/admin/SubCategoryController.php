<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.sub_category.add', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated =  $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);
        try {
            Subcategory::create($validated);
            return back()->with('success', 'Sub Category added successfully');
        } catch (\Exception $e) {
            return back()->with('fail', $e->getMessage());
        }
    }
    public function show()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.sub_category.show', compact('categories'));
    }
}
