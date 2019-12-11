<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index($id){
        $p = Product::find($id);
        $images = $p->images;

        $imagesLeft = collect();
        $imagesRight = collect();

        foreach ($images as $key => $image) {
            if($key%2 == 0)
                $imagesRight->push($image);
            else {
                $imagesLeft->push($image);
            }
        }


        return view('product.show')->with(compact('p', 'imagesLeft', 'imagesRight'));
    }
}
