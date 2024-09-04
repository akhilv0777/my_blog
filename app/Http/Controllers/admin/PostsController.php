<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts;
use App\Models\{Category, OurPost, Subcategory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function show()
    {
        $posts = OurPost::all();
        return view('admin.post.show', compact('posts'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.post.add', compact('categories'));
    }
    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function myPostStore(Posts $request)
    {
        try {
            $thumbnailPath = $this->uploadThumbnail($request);
            $postImagesPath = $this->uploadPostImages($request);
            $postData = array_merge(
                $request->except('thumbnail'),
                ['user_id' => Auth::id(), 'thumbnail' => $thumbnailPath, 'post_images' => $postImagesPath]
            );
            OurPost::create($postData);
            return back()->with('success', 'Post added successfully');
        } catch (\Exception $e) {
            return back()->with('fail', $e->getMessage());
        }
    }
    private function uploadThumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $date = now()->format('Ymd_His');
            $imageName = 'thumbnail_' . $date . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/thumbnail/'), $imageName);
            return 'uploads/thumbnail/' . $imageName;
        }
        return null;
    }
    private function uploadPostImages(Request $request)
    {
        $imageFilenames = [];
        if ($request->hasFile('post_images')) {
            $date = now()->format('Ymd_His');
            foreach ($request->file('post_images') as $image) {
                $imageName = $date . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/post_images/'), $imageName);
                $imageFilenames[] = $imageName;
            }
        }
        return implode(',', $imageFilenames);
    }
}
