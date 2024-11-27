<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'variation_value_id', 'price', 'stock', 'sku'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variationValue()
    {
        return $this->belongsTo(VariationValue::class);
    }
}
