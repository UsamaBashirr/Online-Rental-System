<?php

namespace App\Http\Controllers;

use App\Models\shop;
use App\Models\customers;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function SignupUser(Request $request)
  {
    // Validation
    $request->validate([
      'fname' => 'required',
      'lname' => 'required',
      'phoneno' => 'required|numeric|',
      'address' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:5|max:30'
    ]);


    $customer =  customers::where('email', $request->input('email'))->count();
    if ($customer == 0) {
      $customer = new customers();
      $customer->fname = $request->input('fname');
      $customer->lname = $request->input('lname');
      $customer->phoneno = $request->input('phoneno');
      $customer->address = $request->input('address');
      $customer->email = $request->input('email');
      $customer->password = $request->input('password');
      $customer->save();
      return redirect('loginascustomer')->with('success', 'Account Created Successfully');
    } else {
      return redirect()->back()->with('failure', 'Account Already Exist');
    }
  }

  public function SignupOwner(Request $request)
  {

    // Validation
    $request->validate([
      'fname' => 'required',
      'lname' => 'required',
      'phoneno' => 'required|numeric',
      'cnic' => 'required|numeric',
      'email' => 'required|email',
      'password' => 'required|min:5|max:30',
      'shopname' => 'required',
      'shopaddress' => 'required',
    ]);

    $s = shop::where('email', $request->input('email'))->count();
    
    if ($s == 0) {
      $s = new shop();
      $s->fname = $request->input('fname');
      $s->lname = $request->input('lname');
      $s->phoneno = $request->input('phoneno');
      $s->cnic = $request->input('cnic');
      $s->email = $request->input('email');
      $s->password = $request->input('password');
      $s->shopname = $request->input('shopname');
      $s->shopaddress = $request->input('shopaddress');
      $s->approve = 0;
      $s->status = 0;
      $s->save();
      return redirect('loginasowner')->with('success', 'Account Created Successfully');
    } else {
      return redirect()->back()->with('failure', 'Account Already Exist');
    }
  }



  public function LoginUser(Request $request)
  {
    // Validation
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:5|max:30'
    ]);

    $customer = customers::where('email', $request->input('email'))->count();
    if ($customer == 0) {
      return redirect()->back()->with('failure', 'Account not Exist');
    } else {
      $customer = customers::where('email', $request->input('email'))
        ->where('password', $request->input('password'))->count();
      if ($customer == 0) {
        return redirect()->back()->with('failure', 'Incorrect password');
      } else {
        $customer = customers::where('email', $request->input('email'))
          ->where('password', $request->input('password'))->first();
        session()->put('customer_id', $customer->id);
        session()->forget('shop_id');
        session()->forget('admin_id');

        if (session()->has('path')) {
          $path = session()->get('path');
          session()->forget('path');
          return redirect($path);
        }
        return redirect('/');
      }
    }
  }

  public function LoginOwner(Request $request)
  {
    // Validation
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:5|max:30'
    ]);


    $s = shop::where('email', $request->input('email'))->count();
    if ($s == 0) {
      return redirect()->back()->with('failure', 'Account not Exist');
    } else {

      $s = shop::where('email', $request->input('email'))
        ->where('password', $request->input('password'))->count();
      if ($s == 0) {
        return redirect()->back()->with('failure', 'Incorrect Password');
      } else {

        $s = shop::where('email', $request->input('email'))
          ->where('password', $request->input('password'))
          ->where('approve', 1)->count();
        if ($s == 0) {
          return redirect()->back()->with('failure', 'Account not approve');
        } else {
          $s = shop::where('email', $request->input('email'))
            ->where('password', $request->input('password'))->first();
          session()->put('shop_id', $s->id);
          session()->forget('customer_id');
          session()->forget('admin_id');



          return redirect('shophome');
        }
      }
    }
  }
}
