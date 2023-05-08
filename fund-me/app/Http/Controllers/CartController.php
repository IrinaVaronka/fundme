<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {

        $id = (int) $request->id;
        $sum = (int) $request->sum;
        $cart = $request->session()->get('cart', []);
        if (!isset($cart[$id])) {
            $cart[$id] = $sum;
        } else {
            $cart[$id] += $sum;
        }
        $request->session()->put('cart', $cart);
        $Cart = new Cart($cart);
        
        return response()->json([
            'sum' => sum($cart),
            'total' => $Cart->total()
        ]);
    }
}
