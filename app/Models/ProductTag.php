<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $fillable = [
        'product_id',
        'tag_id',
    ];

    /**
     * Relacionamento com produto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relacionamento com tag
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
