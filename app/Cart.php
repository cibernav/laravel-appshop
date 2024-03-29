<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_date', 'arrived_date', 'status', 'user_id'];

    public function details(){
        return $this->hasMany(CartDetail::class);
    }


}
