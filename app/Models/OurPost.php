<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurPost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'subcategory_id', 'content', 'thumbnail', 'post_images', 'user_id'];
    protected $casts = [
        'post_images' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
