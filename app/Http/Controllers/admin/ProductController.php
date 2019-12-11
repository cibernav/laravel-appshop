<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    //

    public function index(){

        $products = Product::paginate(10);
        return view('admin.product.index')->with(compact('products'));
    }

    public function create(){

        $categories = Category::orderBy('name')->get();
        return view('admin.product.create')->with(compact('categories'));
    }

    public function cargarCategoria(){
        
    }

    public function store(Request $r){

        //dd($r->all());

        $this->validate($r, Product::$rules, Product::$messages);

        $product = new Product();
        $product->name = $r->input('name');
        $product->description = $r->input('description');
        $product->long_description = $r->input('long_description');
        $product->category_id = $r->category_id;
        $product->price = $r->input('price');

        $product->save();

        return redirect('/admin/product/');
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();

        return view('admin.product.edit',array(
            'p' => $product,
            'categories' => $categories
        ));
    }

    public function update($id, Request $r){

        //dd($r->all());
        //validar
        $this->validate($r, Product::$rules, Product::$messages);
        $product = Product::find($id);
        $product->name = $r->input('name');
        $product->description = $r->input('description');
        $product->long_description = $r->input('long_description');
        $product->category_id = $r->category_id;
        $product->price = $r->input('price');

        $product->save();

        return redirect('/admin/product');
    }

    public function destroy($id){

        //dd($r->all());

        $product = Product::find($id);
        $product->delete();

        //return redirect('/admin/product');
        return back();
    }
}
