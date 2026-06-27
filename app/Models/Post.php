<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
        'thumbnail',
        'bg_detail',
        'extra_image_1',
        'extra_image_2',
        'hashtags'
    ];

    // Fungsi Otomatis Pembuat Slug saat Judul Berita Disimpan
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title) . '-' . Str::random(5);
        });
    }
}