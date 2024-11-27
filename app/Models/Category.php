<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $with = ['cover'];

    protected $fillable = [
        'name',
        'description',
        'status',
        'cover_id',
        'meta_tag_title',
        'meta_tag_description',
        'meta_tag_keywords',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public function cover()
    {
        return $this->belongsTo(Upload::class, 'cover_id');
    }
}
