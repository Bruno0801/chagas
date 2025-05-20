<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'recipient_name',
        'cep',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'freight',
    ];

    /**
     * Relacionamento: Address pertence a um User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento: Address pode estar ligado a vários pedidos
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
