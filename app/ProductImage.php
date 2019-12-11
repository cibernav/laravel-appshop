<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    //

    public function product(){
        return $this->belongTo(Product::class);
    }

    //Campo calculado
    //public function getXAttribute()
    public function getUrlAttribute(){

        if (substr($this->image, 0, 4) === "http"){
            return $this->image;
        }

        return Storage::url($this->image);
    }
}
