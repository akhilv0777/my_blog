<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        try {
            Category::create($validated);
            return back()->with('success', 'Category added successfully');
        } catch (\Exception $e) {
            return back()->with('fail', $e->getMessage());
        }
    }

    public function show()
    {
        $categories = Category::all();
        return view('admin.category.show', compact('categories'));
    }
}
