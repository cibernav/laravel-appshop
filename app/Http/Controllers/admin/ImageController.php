<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;
use App\ProductImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
class ImageController extends Controller
{
    //

    public function index($id){
        $p = Product::find($id);
        $images = $p->images()->orderBy('featured', 'desc')->get();
        return view('admin.product.image.index')->with(compact('p', 'images'));
    }

    public function store(Request $request, $id){
        
        $file =  $request->file('photo');

        if($file){
            //Forma 1
            /*$path = public_path(). '/images/products';
            $filename = time() . $file->getClientOriginalName();
            $file->move($path, $filename);*/

            //Forma 2
            $filename = uniqid() . $file->getClientOriginalName();
            Storage::disk('public')->put($filename, File::get($file));

            $prodimage= new ProductImage();
            $prodimage->product_id = $id;
            //$prodimage->featured = false;
            $prodimage->image = $filename;

            $prodimage->save();
        }

        return back();
    }

    public function destroy($id){
        $prodImage = ProductImage::find($id);
        if ($prodImage){

            if (substr($prodImage->image, 0, 4) === "http")
                $delete = true;
            else {
                //Forma 1
                //$fullpath = public_path() . 'images/products/' . $prodImage->image;
                //$delete = File::delete($fullpath);

                //Forma 2
                $delete = Storage::disk('public')->delete($prodImage->image);
            }

            if($delete)
                $prodImage->delete();

            return back();
        }
    }

    public function select($id, $image){

        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $prodimage = ProductImage::find($image);
        $prodimage->featured = true;
        $prodimage->save();
        
        return back();
        //dd($id . '/' . $image);
    }
}
