<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'id_sub_category', 'name', 'slug', 'image', 'description', 'content', 'price'];

    public function idSubCategory()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
