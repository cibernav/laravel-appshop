<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    //

    //$product->category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'long_description', 'price', 'category_id'];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required'
    ];

    public static $messages = [
        'name.required'=>'Es necesario ingresar un nombre para el producto',
        'name.min'=>'El nombre del producto debes tener al menos 3 caracteres',
        'description.required'=>'El producto debe tener alguna descripción',
        'description.max'=>'La descripcion corta no puede exceder los 200 caracteres',
        'price.required'=>'El producto debe tener un precio',
        'price.numeric'=>'El producto debe tener un precio valido, no acepta comas ni puntos',
        'price.min'=>'No se admiten precios negativos',
        'category_id.required' => 'Debe seleccionar una categoria'
    ];

    public function getFeaturedImageUrlAttribute(){
        $image = $this->images()->where('featured',true)->first();
        if(!$image){
            $image = $this->images()->first();
        }

        if($image)
            return $image->url;
        
        return Storage::url('no_imagen.jpg');
    }

    public function getCategoryNameAttribute(){
        $category = $this->category;
        if($category)
            return $category->name;

        return 'General';
    }
}
