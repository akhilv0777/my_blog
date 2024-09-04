<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OurPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = OurPost::orderBy('created_at', 'desc')->paginate(4);
        return view('post', compact('posts'), compact('categories'));
    }
    public function show_details($id)
    {
        $post = OurPost::findOrFail($id);
        return view('posts_details', compact('post'));
    }
    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
    
    
}
