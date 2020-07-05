<?php

namespace App\Models;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use Translatable;
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'id_sub_category', 'name', 'slug', 'image', 'description', 'content', 'price'];
    protected $translatable = ['description','content'];

    public function idSubCategory()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
