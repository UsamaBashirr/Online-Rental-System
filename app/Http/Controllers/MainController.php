<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\subcategories;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendcontactmail;
use App\Models\shop;
use App\Models\cartitem;
use App\Models\customers;
use App\Models\orderproduct;
use App\Models\rentproducts;
use DateTime;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function homepage()
    {
        $c = categories::all();
        $subcat = subcategories::all();
        $product = products::all();
        $customerCount = customers::all()->count();
        $shopCount = shop::all()->count();
        $productCount = products::all()->count();
        return view('website.index', compact('c', 'subcat', 'product', 'customerCount', 'shopCount', 'productCount'));
    }

    // Checkout
    public function CheckOutPage()
    {
        if (!session()->has('customer_id')) {
            return redirect('/');
        } else {
            $cartitem = cartitem::where('userid', session()->get('customer_id'))->count();
            if ($cartitem == 0) {
                return redirect('/');
            }
            $customer = customers::find(session()->get('customer_id'));
            $cartData = DB::table('cartitem')->join('products', 'products.id', '=', 'cartitem.proid')
                ->select('products.*', 'cartitem.*')
                ->where('cartitem.userid', session()->get('customer_id'))
                ->get();
            return view('website.check-out', compact('customer', 'cartData'));
        }
    }
    public function ContactPage()
    {
        return view('website.contact');
    }

    public function ShoppingCartPage()
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {
            $cartData = DB::table('cartitem')->join('products', 'products.id', '=', 'cartitem.proid')
                ->select('products.*', 'cartitem.*')
                ->where('cartitem.userid', session()->get('customer_id'))
                ->get();
            return view('website.shopping-cart', compact('cartData'));
        }
    }

    public function SignupasUser()
    {
        return view('website.signupascustomer');
    }
    public function SignupasOwner()
    {
        return view('website.signupasowner');
    }

    public function SendContactMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $details = [
            'title' => $request->input('subject'),
            'body' => 'My Name is ' . $request->input('name') . " " . "and Email is " . $request->input('email') . " and Message is " . $request->input('message')
        ];
        Mail::to('1muneeb7007@gmail.com')->send(new sendcontactmail($details));
        return redirect()->back()->with('success', 'Email has been send...!');
    }

    public function LoginasCustomer()
    {
        return view('website.loginascustomer');
    }
    public function LoginasOwner()
    {
        return view('website.loginasowner');
    }

    public function ShopHomePage()
    {
        if (!session()->has('shop_id')) {
            return redirect('loginasowner');
        } else {

            $products = products::all()
                ->where('shopid', session()->get('shop_id'));

            $shop = shop::find(session()->get('shop_id'));

            return view('website.shopmain', compact('products', 'shop'));
        }
    }

    public function Product_Page($id)
    {

        $pro = products::find($id);
        $subcat = subcategories::find($pro->subcatid);
        $cat = categories::find($subcat->catid);
        $shop = shop::find($pro->shopid);
        $RelatedProducts = products::where('subcatid', $pro->subcatid)->get();
        return view('website.product-page', compact('pro', 'cat', 'shop', 'RelatedProducts'));
    }


    // Search Product
    public function SearchProduct(Request $request)
    {
        $product = products::where('name', $request->input('search'))->get();
        $requestproduct = $request->input('search');
        return view('website.searchproduct', compact('product', 'requestproduct'));
    }

    public function Delete_Cart_Item($id)
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {
            cartitem::find($id)->delete();
            return redirect()->back()->with('success', 'Cart item deleted successfully');
        }
    }
    public function Update_Cart_Item(Request $request)
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {
            $request->validate([
                'quantity' => 'required',
                'startdate' => 'required|after:today',
                'enddate' => 'required|after:startdate',
            ]);
            $cartitem = cartitem::find($request->input('id'));
            $cartitem->quantity = $request->input('quantity');
            $cartitem->startdate = $request->input('startdate');
            $cartitem->enddate = $request->input('enddate');
            $datetime1 = new DateTime($cartitem->startdate);
            $datetime2 = new DateTime($cartitem->enddate);
            $interval = $datetime1->diff($datetime2);
            $cartitem->days = $interval->format('%a');

            $price = $request->input('price');
            $cartitem->totalPrice = $price * $cartitem->quantity * $cartitem->days;
            $cartitem->save();

            return redirect()->back()->with('success', 'Cart item updated successfully');
        }
    }

    public function Customer_Profile_Page()
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {
            $customer = customers::find(session()->get('customer_id'));
            return view('website.customer_profile', compact('customer'));
        }
    }
    public function Update_Customer_Profile(Request $request)
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {

            $customer = customers::find(session()->get('customer_id'));
            $customer->fname = $request->input('fname');
            $customer->lname = $request->input('lname');
            $customer->phoneno = $request->input('phoneno');
            $customer->address = $request->input('address');

            if ($customer->password == $request->input('password')) {
                $customer->save();
                return redirect()->back()->with('success', 'Profile Successfully Updated');
            } else {
                $customer->password = $request->input('password');
                $customer->save();
                session()->forget('customer_id');
                return redirect('loginascustomer');
            }

            return redirect()->back()->with('success', 'Profile Successfully Updated');
        }
    }
    public function CustomerBookings()
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {
            $My_Orders = DB::table('orderproduct')
                ->join('products', 'products.id', '=', 'orderproduct.proid')
                ->join('shop', 'shop.id', '=', 'products.shopid')
                ->join('customers', 'customers.id', '=', 'orderproduct.userid')
                ->select('products.*', 'shop.phoneno', 'orderproduct.quantity as orderquantity', 'orderproduct.status as orderstatus', 'orderproduct.id as orderid', 'customers.email as customeremail')
                ->where('orderproduct.userid', session()->get('customer_id'))
                ->get();
            return view('website.customer_bookings', compact('My_Orders'));
        }
    }

    public function CancelBooking($id, $proid, $customeremail)
    {
        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {
            orderproduct::find($id)->delete();

            $details = [
                'title' => 'Cancel Booking',
                'body' => 'You Successfully Cancel the Booking'
            ];
            Mail::to($customeremail)->send(new sendcontactmail($details));

            $cancelorder = [
                'title' => 'Cancel Booking',
                'body' => 'The Customer ID of Cancel Booking is ' . session()->has('customer_id') . ' and the Product ID is ' . $proid
            ];
            Mail::to('1muneeb7007@gmail.com')->send(new sendcontactmail($cancelorder));


            return redirect()->back()->with('success', 'Order Successfully Cancel');
        }
    }

    public function Logout()
    {
        if (session()->has('customer_id')) {
            session()->forget('customer_id');
            return redirect('loginascustomer');
        }
        if (session()->has('shop_id')) {
            session()->forget('shop_id');
            return redirect('loginasowner');
        }
    }



    // Jazz Cash Payment

    public function DoCheckout(Request $request)
    {

        if (!session()->has('customer_id')) {
            return redirect('loginascustomer');
        } else {


            $totalPrice = $request->input('totalprice');

            $pp_Amount         = $totalPrice;

            //get the current date and time
            //be careful set TimeZone in config/app.php
            $DateTime         = new \DateTime();
            $pp_TxnDateTime = $DateTime->format('YmdHis');

            //to make expiry date and time add one hour to current date and time
            $ExpiryDateTime = $DateTime;
            $ExpiryDateTime->modify('+' . 1 . ' hours');
            $pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');

            //to make expiry date and time add one hour to current date and time
            $pp_TxnRefNo = 'T' . $pp_TxnDateTime;

            $post_data =  array(
                "pp_Version"             => Config::get('constants.jazzcash.VERSION'),
                "pp_TxnType"             => "MWALLET",
                "pp_Language"             => Config::get('constants.jazzcash.LANGUAGE'),
                "pp_MerchantID"         => Config::get('constants.jazzcash.MERCHANT_ID'),
                "pp_SubMerchantID"         => "",
                "pp_Password"             => Config::get('constants.jazzcash.PASSWORD'),
                "pp_BankID"             => "TBANK",
                "pp_ProductID"             => "RETL",
                "pp_TxnRefNo"             => $pp_TxnRefNo,
                "pp_Amount"             => $pp_Amount,
                "pp_TxnCurrency"         => Config::get('constants.jazzcash.CURRENCY_CODE'),
                "pp_TxnDateTime"         => $pp_TxnDateTime,
                "pp_BillReference"         => "billRef",
                "pp_Description"         => "Description of transaction",
                "pp_TxnExpiryDateTime"     => $pp_TxnExpiryDateTime,
                "pp_ReturnURL"             => Config::get('constants.jazzcash.RETURN_URL'),
                "pp_SecureHash"         => "",
                "ppmpf_1"                 => session()->get('customer_id'),
            );

            $pp_SecureHash = $this->get_SecureHash($post_data);

            $post_data['pp_SecureHash'] = $pp_SecureHash;


            $rentproducts = new rentproducts();
            $rentproducts->customerid = session()->get('customer_id');
            $rentproducts->TxnRefNo = $post_data['pp_TxnRefNo'];
            $rentproducts->amount = $totalPrice;
            $rentproducts->description = $post_data['pp_Description'];
            $rentproducts->status = 'pending';
            $rentproducts->save();

            $cartitem = cartitem::where('userid', session()->get('customer_id'))->get();

            foreach ($cartitem as $value) {
                $orderproduct = new orderproduct();
                $orderproduct->userid = $value['userid'];
                $orderproduct->proid = $value['proid'];
                $orderproduct->rentproductid = $rentproducts->id;
                $orderproduct->quantity = $value['quantity'];
                $orderproduct->status = "pending";
                $orderproduct->price = $value['totalPrice'];
                $orderproduct->save();
            }
            cartitem::where('userid', session()->get('customer_id'))->delete();

            Session::put('post_data', $post_data);

            return view('website.do_checkout_v');
        }
    }


    private function get_SecureHash($data_array)
    {
        ksort($data_array);

        $str = '';
        foreach ($data_array as $value) {
            if (!empty($value)) {
                $str = $str . '&' . $value;
            }
        }

        $str = Config::get('constants.jazzcash.INTEGERITY_SALT') . $str;

        $pp_SecureHash = hash_hmac('sha256', $str, Config::get('constants.jazzcash.INTEGERITY_SALT'));

        return $pp_SecureHash;
    }


    public function paymentStatus(Request $request)
    {
        $response = $request->input();

        if ($response['pp_ResponseCode'] == '000') {
            $response['pp_ResponseMessage'] = 'Your Payment has been Successful';
            DB::table('rentproducts')
                ->where('TxnRefNo', $response['pp_TxnRefNo'])
                ->where('customerid', $response['ppmpf_1'])
                ->update(['status' => 'completed']);
        }

        return view('website.payment-status', ['response' => $response]);
    }
}
