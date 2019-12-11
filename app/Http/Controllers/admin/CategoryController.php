<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    //

    public function index(){

        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.category.index')->with(compact('categories'));
    }

    public function create(){

        return view('admin.category.create');
    }


    public function store(Request $r){

        //dd($r->all());

        $this->validate($r, Category::$rules, Category::$messages);

        $category = new Category();
        $category->name = $r->input('name');
        $category->description = $r->input('description');


        $category->save();

        return redirect('/admin/category/');
    }

    public function edit($id){
        $category = Category::find($id);

        return view('admin.category.edit',array(
            'c' => $category,
        ));
    }

    public function update($id, Request $r){

        //dd($r->all());
        //validar
        $this->validate($r, Category::$rules, Category::$messages);
        $category = Category::find($id);
        $category->name = $r->input('name');
        $category->description = $r->input('description');

        $category->save();

        return redirect('/admin/category');
    }

    public function destroy($id){

        //dd($r->all());

        $category = Category::find($id);
        $category->delete();

        //return redirect('/admin/product');
        return back();
    }
}
