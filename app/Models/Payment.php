<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'method',
        'status',
        'amount',
        'link',
        'url',
        'paid_at',
    ];

    /**
     * Relacionamento: o pagamento pertence a um pedido
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
