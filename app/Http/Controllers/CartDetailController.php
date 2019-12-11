<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    //

    public function store(Request $request){

        $cartdetail = new CartDetail();
        $cartdetail->cart_id = auth()->user()->cart->id;
        $cartdetail->product_id = $request->product_id;
        $cartdetail->quantity = $request->quantity;
        $cartdetail->save();

        return back()->with([
            'status' => 'El articulo se agrego al carrito de compras'
        ]);
    }

    public function destroy($id){

        $cartdet = CartDetail::find($id);
        if($cartdet->cart_id == auth()->user()->cart->id)
            $cartdet->delete();

        return back()->with([
            "status" => "El registro se elimino de forma correcta."
        ]);
    }
     
}
