<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\subcategories;
use App\Models\orderproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\sendcontactmail;
use App\Models\categories;
use App\Models\rentproducts;
use App\Models\shop;
use App\Models\withdraw;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    public function Shop_Delete_Product($proid)
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            products::find($proid)->delete();
            return redirect()->back()->with('success', 'Product Deleted Successfully');
        }
    }
    public function Shop_Edit_Product($proid)
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            $product = products::find($proid);

            return view('website.editshopproduct', compact('product'));
        }
    }
    public function Update_Shop_Product(Request $request)
    {

        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {

            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'details' => 'required',
                'quantity' => 'required',
                'image1' => 'required|image',
                'image2' => 'required|image',

            ]);

            $product = products::find($request->input('id'));
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->details = $request->input('details');
            $product->quantity = $request->input('quantity');
            if ($request->hasFile('image1')) {
                $product->img1 = $request->file('image1')->getClientOriginalName();
                $request->file('image1')->move('img', $product->img1);
            }
            if ($request->hasFile('image2')) {
                $product->img2 = $request->file('image2')->getClientOriginalName();
                $request->file('image2')->move('img', $product->img2);
            }
            $product->shopid = session()->get('shop_id');
            $product->save();
            return redirect()->back()->with('success', 'Product Updated Successfully');
        }
    }

    public function Show_Subcategories($id)
    {
        $allSubcategories = subcategories::where('catid', $id)->get();
        return json_encode($allSubcategories);
    }

    public function AddProductPage()
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {

            $allCategories = categories::all();
            $subcategories = subcategories::all();

            return view('website.addshopproduct', compact('allCategories', 'subcategories'));
        }
    }

    public function Add_Shop_Product(Request $request)
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'details' => 'required',
                'category' => 'required',
                'subcat' => 'required',
                'quantity' => 'required',
                'image1' => 'required|image',
                'image2' => 'required|image',
            ]);

            $pro = products::where('name', strtolower($request->input('name')))
                ->where('subcatid', $request->input('subcat'))
                ->count();
            if ($pro == 0) {
                $pro = new products();
                $pro->name = $request->input('name');
                $pro->price = $request->input('price');
                $pro->details = $request->input('details');
                $pro->subcatid = $request->input('subcat');
                $pro->quantity = $request->input('quantity');
                $pro->img1 = $request->file('image1')->getClientOriginalName();
                $request->file('image1')->move('img', $pro->img1);
                $pro->img2 = $request->file('image2')->getClientOriginalName();
                $request->file('image2')->move('img', $pro->img2);
                $pro->shopid = session()->get('shop_id');
                $pro->save();
            } else {
                $pro = products::where('name', strtolower($request->input('name')))->first();
                $pro->quantity += $request->input('quantity');
                $pro->save();
            }

            return redirect()->back()->with('success', 'Product Added Successfully');
        }
    }

    public function Shop_Orders_Page()
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            $CompletedOrders = DB::table('orderproduct')
                ->join('products', 'products.id', '=', 'orderproduct.proid')
                ->join('shop', 'shop.id', '=', 'products.shopid')
                ->join('customers', 'customers.id', '=', 'orderproduct.userid')
                ->select('products.*', 'orderproduct.quantity as orderquantity', 'customers.email')
                ->where('shop.id', session()->get('shop_id'))
                ->where('orderproduct.status', 'completed')
                ->get();
            $CompletedOrdersCount = DB::table('orderproduct')
                ->join('products', 'products.id', '=', 'orderproduct.proid')
                ->join('shop', 'shop.id', '=', 'products.shopid')
                ->where('shop.id', session()->get('shop_id'))
                ->where('orderproduct.status', 'completed')
                ->count();


            $PendingOrdersCount = DB::table('orderproduct')
                ->join('products', 'products.id', '=', 'orderproduct.proid')
                ->join('shop', 'shop.id', '=', 'products.shopid')
                ->where('shop.id', session()->get('shop_id'))
                ->where('orderproduct.status', 'Pending')
                ->count();

            $PendingOrders = DB::table('orderproduct')
                ->join('products', 'products.id', '=', 'orderproduct.proid')
                ->join('rentproducts', 'rentproducts.id', '=', 'orderproduct.rentproductid')
                ->join('shop', 'shop.id', '=', 'products.shopid')
                ->join('customers', 'customers.id', '=', 'orderproduct.userid')
                ->select('products.*', 'orderproduct.quantity as orderquantity', 'orderproduct.id as orderid', 'customers.email as customeremail', 'rentproducts.status as rentproductstatus')
                ->where('shop.id', session()->get('shop_id'))
                ->where('orderproduct.status', 'Pending')
                ->get();

            return view('website.shop_orders', compact('CompletedOrders', 'CompletedOrdersCount', 'PendingOrders', 'PendingOrdersCount'));
        }
    }


    public function Withdraw()
    {
        $totalamount = orderproduct::where('status', '=', 'completed')->get();

        $withdrawdata = withdraw::where('AmountStatus', '=', 'completed')->get();
        $withdrawCount = withdraw::where('AmountStatus', '=', 'completed')->count();


        return view('website.withdraw', compact('totalamount', 'withdrawdata', 'withdrawCount'));
    }

    public function withdrawAmount(Request $request)
    {

        $totalprice = $request->totalprice;
        $withdrawprice = $request->input('amount');
        if ($withdrawprice <= $totalprice) {
            $withdrawamount = new withdraw();
            $withdrawamount->shopid = session()->get('shop_id');
            $withdrawamount->withdrawto = $request->input('withdraw');
            $withdrawamount->phonenumber = $request->input('phonenumber');
            $withdrawamount->withdrawamount = $withdrawprice - 50;
            $withdrawamount->AmountStatus = 'Pending';
            $withdrawamount->save();

            return redirect()->back()->with('success', 'Your Amount Successfully Transfer in 3 or 4 working days..!');
        } else {
            return redirect()->back()->with('failure', 'Please Add Amount Below Your Available Balance');
        }
    }



    public function Shop_Profile_Page()
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            $shop = shop::find(session()->get('shop_id'));
            return view('website.shop_profile', compact('shop'));
        }
    }
    public function Update_Shop_Profile(Request $request)
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {

            $shop = shop::find(session()->get('shop_id'));
            $shop->fname = $request->input('fname');
            $shop->lname = $request->input('lname');
            $shop->phoneno = $request->input('phoneno');
            $shop->cnic = $request->input('cnic');
            $shop->shopname = $request->input('shopname');
            $shop->shopaddress = $request->input('shopaddress');

            if ($shop->password == $request->input('password')) {
                $shop->save();
                return redirect()->back()->with('success', 'Profile Successfully Updated');
            } else {
                $shop->password = $request->input('password');
                $shop->save();
                session()->forget('shop_id');
                return redirect('loginasowner');
            }
            return redirect()->back()->with('success', 'Profile Successfully Updated');
        }
    }
    // SHop Confirm The Order
    public function Confirm_Order($id, $email)
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            orderproduct::where('id', $id)->update([
                'status' => 'Completed'
            ]);
            $details = [
                'title' => 'Confirm Order',
                'body' => 'Your Order has been Delivered'
            ];
            Mail::to($email)->send(new sendcontactmail($details));
            return redirect()->back()->with('success', 'Order Completed Sucessfully');
        }
    }
    public function Cancel_Order($id, $email)
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {
            orderproduct::where('id', $id)->delete();
            $details = [
                'title' => 'Cancel Order',
                'body' => 'Your Order has been Cancelled'
            ];
            Mail::to($email)->send(new sendcontactmail($details));
            return redirect()->back()->with('success', 'Order has been Cancelled');
        }
    }
}
