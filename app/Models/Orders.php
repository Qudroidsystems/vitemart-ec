<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'genOrderId',
        'customer_id',
        'total_amount',
        'status',
    ];


    public function items()
{
    return $this->hasMany(OrderItem::class, 'order_id'); // Explicitly specify the foreign key if needed
}

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
