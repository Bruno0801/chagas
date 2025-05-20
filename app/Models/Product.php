<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'size',
        'stock',
        'price',
        'description',
        'discount',
        'color',
        'category_id',
    ];

    /**
     * Relacionamento: o produto pertence a uma categoria
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relacionamento: o produto pode ter várias imagens
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Relacionamento: o produto pode ter várias tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
