<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    /**
     * Relacionamento: a tag pertence a vários produtos
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }
}
