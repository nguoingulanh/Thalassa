<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CategoryProduct extends Model
{
    //
    use Translatable;
    protected $table = 'category_product';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'parent_id', 'name', 'slug', 'image'];
    protected $translatable = ['name'];

    public function categories()
    {
        return $this->hasMany(CategoryProduct::class, 'parent_id');
    }

    public function parentId()
    {
        return $this->belongsTo(CategoryProduct::class, 'parent_id');
    }

    public function Product()
    {
        return $this->hasMany(Product::class,'id_sub_category');
    }
}
