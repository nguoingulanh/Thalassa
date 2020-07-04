<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'id_account', 'id_product', 'quantity'];

    public function idProduct()
    {
        return $this->belongsTo(Product::class,'id_product');
    }

    public function idAccount()
    {
        return $this->belongsTo(User::class,'id_account');
    }
}
