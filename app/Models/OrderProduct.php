<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    /**
     * Relacionamento: pertence a um pedido
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relacionamento: pertence a um produto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
