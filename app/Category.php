<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['name', 'description', 'image'];

    //$category->products

    public function products(){
        return $this->hasMany(Product::class);
    }

    public static $rules =[
        'name' => 'required|min:3',
        'description' => 'required|max:200'
    ];

    public static $messages = [
        'name.required' => 'Debe ingresar un nombre',
        'description.required' => 'Debe ingresar una descripcion'
    ];
}
