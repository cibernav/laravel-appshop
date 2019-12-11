<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'discount'];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
