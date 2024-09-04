<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Posts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'subcategory_id' => 'nullable|integer|exists:subcategories,id',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
            'content' => 'required|string',
            'post_images.*' => 'nullable|image|mimes:jpeg,png,jpg|',
        ];
    }
}
