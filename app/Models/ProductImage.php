<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'title',
        'url',
        'product_id',
    ];

    /**
     * Relacionamento: a imagem pertence a um produto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
