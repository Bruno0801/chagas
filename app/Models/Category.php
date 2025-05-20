<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Relacionamento: uma categoria tem muitos produtos
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
