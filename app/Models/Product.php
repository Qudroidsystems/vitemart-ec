<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'thumbnail',
        'meta_tag_title',
        'meta_tag_name',
        'meta_tag_description',
        'meta_tag_keywords',
    ];

    protected $with = ['cover', 'tags', 'brands'];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'product_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'product_brand');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'product_unit')->withPivot('quantity')->withTimestamps();
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'warehouse_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function variants()
    {
        return $this->belongsToMany(VariantValue::class, 'product_variant')
                    ->withPivot('sku', 'price', 'stock')
                    ->withTimestamps();
    }

    public function cover() {
        return $this->belongsTo(Upload::class, 'cover_id');
    }
}
