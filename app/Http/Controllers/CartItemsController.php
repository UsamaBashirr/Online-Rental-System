<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cartitem;
use DateTime;

class CartItemsController extends Controller
{
    public function AddToCart(Request $request)
    {
        if (!session()->has('customer_id')) {
            session()->put('path', $request->input('path'));
            return redirect('loginascustomer');
        } else {
            $request->validate([
                'quantity' => 'required',
                'startdate' => 'required|after:today',
                'enddate' => 'required|after:startdate',
            ]);
           
                $c = new cartitem();
                $c->proid = $request->input('proid');
                $c->userid = session()->get('customer_id');
                $c->startdate = $request->input('startdate');
                $c->enddate = $request->input('enddate');
                $c->quantity = $request->input('quantity');


                $datetime1 = new DateTime($c->startdate);
                $datetime2 = new DateTime($c->enddate);
                $interval = $datetime1->diff($datetime2);
                $c->days = $interval->format('%a');

                $price = $request->input('price');
                $c->totalPrice = $price * $c->quantity * $c->days;
                

                $c->save();
                return redirect()->back()->with('success', 'Product Add to cart successfully');
        }
    }
}
