<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'price',
        'discount',
        'freight',
        'total',
    ];

    /**
     * Relacionamento: o pedido pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento: o pedido pertence a um endereço
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Relacionamento: o pedido tem muitos itens
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Relacionamento: o pedido tem um pagamento
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
