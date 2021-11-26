<?php

namespace App\Http\Controllers;

use App\Mail\sendcontactmail;
use App\Models\admin;
use App\Models\categories;
use App\Models\customers;
use App\Models\products;
use App\Models\shop;
use App\Models\subcategories;
use App\Models\withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function Admin_Dashboard_Page()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $CountPendingRequests = shop::where('approve', 0)->count();
            $allShops = shop::where('approve', 1)->get();
            return view('adminpanel.index', compact('allShops', 'CountPendingRequests'));
        }
    }
    public function Admin_Login_Page()
    {
        return view('adminpanel.login');
    }
    public function AdminLogin(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:30'
        ]);

        $a = admin::where('email', $request->input('email'))->count();
        if ($a == 0) {
            return redirect()->back()->with('failure', 'Account Not Found...!');
        } else {
            $a = admin::where('email', $request->input('email'))
                ->where('password', $request->input('password'))
                ->count();
            if ($a == 0) {
                return redirect()->back()->with('failure', 'Incorrect Password');
            } else {
                $a = admin::where('email', $request->input('email'))
                    ->where('password', $request->input('password'))
                    ->first();
                session()->put('admin_id', $a->id);
                session()->put('admin_name', $a->name);
                session()->forget('customer_id');
                session()->forget('shop_id');

                return redirect('admin_dashboard');
            }
        }
    }
    public function AdminLogout()
    {
        session()->forget('admin_id');
        return redirect('admin_login');
    }
    public function Add_Category(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            // Validation
            $request->validate([
                'category' => 'required'
            ]);

            $category = categories::where('name', $request->input('category'))->count();
            if ($category == 0) {
                $category = new categories();
                $category->name = strtolower($request->input('category'));
                $category->save();
                return redirect()->back()->with('success', 'Category added successfully');
            } else {
                return redirect()->back()->with('failure', 'Category Already exist');
            }
        }
    }
    public function Sub_Categories_Table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $allCategories = categories::all();
            $allSubcategories = DB::table('subcategories')
                ->join('categories', 'categories.id', '=', 'subcategories.catid')
                ->select('categories.name as catname', 'subcategories.name as subcatname', 'subcategories.id as subcatid')
                ->get();
            return view('adminpanel.sub_categories', compact('allSubcategories', 'allCategories'));
        }
    }
    public function Add_Subcategory(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            // Validation
            $request->validate([
                'subcategory' => 'required',
                'category' => 'required'
            ]);

            $s = subcategories::where('name', strtolower($request->input('subcategory')))->count();
            if ($s == 0) {
                $s = new subcategories();
                $s->name = strtolower($request->input('subcategory'));
                $s->catid = $request->input('category');
                $s->save();
                return redirect()->back()->with('success', 'Subcategory Added Successfully');
            } else {
                return redirect()->back()->with('failure', 'Subcategory Already Exist ');
            }
        }
    }
    public function products_table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $allProducts = DB::table('products')
                ->join('subcategories', 'subcategories.id', '=', 'products.subcatid')
                ->join('shop', 'shop.id', '=', 'products.shopid')
                ->select('products.*', 'subcategories.name as subcatname', 'shop.shopname')
                ->get();
            return view('adminpanel.products', compact('allProducts'));
        }
    }

    public function Withdraw_Table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {

            $CompletedWithdraw = DB::table('withdraw')
                ->join('shop', 'shop.id', '=', 'withdraw.shopid')
                ->select('shop.*', 'withdraw.*')
                ->where('withdraw.AmountStatus', 'completed')
                ->get();
          

            $PendingWithdrawCount = DB::table('withdraw')
                ->join('shop', 'shop.id', '=', 'withdraw.shopid')
                ->where('withdraw.AmountStatus', 'Pending')
                ->count();

            return view('adminpanel.withdraw', compact('CompletedWithdraw', 'PendingWithdrawCount'));
        }
    }

    public function Pending_Withdraw_Table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {


            $CompletedWithdrawCount = DB::table('withdraw')
                ->join('shop', 'shop.id', '=', 'withdraw.shopid')
                ->where('withdraw.AmountStatus', 'completed')
                ->count();

            $PendingWithdraw = DB::table('withdraw')
                ->join('shop', 'shop.id', '=', 'withdraw.shopid')
                ->select('shop.*', 'withdraw.*')
                ->where('withdraw.AmountStatus', 'Pending')
                ->get();
            return view('adminpanel.pending_withdraw', compact('CompletedWithdrawCount', 'PendingWithdraw'));
        }
    }


    public function Confirm_Withdraw($id, $email)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            withdraw::where('id', $id)->update([
                'AmountStatus' => 'Completed'
            ]);
            $details = [
                'title' => 'Confirm Withdraw',
                'body' => 'Your Payment is sent to your Account Number.'
            ];
            Mail::to($email)->send(new sendcontactmail($details));
            return redirect()->back()->with('success', 'Withdraw Completed Sucessfully');
        }
    }
    public function Cancel_Withdraw($id, $email)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            withdraw::where('id', $id)->delete();
            $details = [
                'title' => 'Cancel Withdraw',
                'body' => 'Your Payment Transfer has been Cancelled due to some reason'
            ];
            Mail::to($email)->send(new sendcontactmail($details));
            return redirect()->back()->with('success', 'Withdraw has been Cancelled');
        }
    }



    public function Categories_Table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $allCategories = categories::all();
            return view('adminpanel.categories', compact('allCategories'));
        }
    }

    public function Customers_Table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $allCustomers = customers::all();
            return view('adminpanel.customers', compact('allCustomers'));
        }
    }
    public function shops_table()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $CountPendingRequests = shop::where('approve', 0)->count();
            $allShops = shop::where('approve', 1)->get();
            return view('adminpanel.shops', compact('allShops', 'CountPendingRequests'));
        }
    }
    public function Admin_Block_Shop($shopid)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            shop::find($shopid)->update([
                'status' => 1
            ]);
            return redirect()->back()->with('success', 'Shop Successsfully Blocked');
        }
    }
    public function Admin_Unblock_Shop($shopid)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            shop::find($shopid)->update([
                'status' => 0
            ]);
            return redirect()->back()->with('success', 'Shop Successsfully UnBlocked');
        }
    }
    public function Admin_View_Pending_Requests()
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $allPendingShops = shop::where('approve', 0)->get();
            $CountAcceptedRequests = shop::where('approve', 1)->count();

            return view('adminpanel.pending_shops', compact('allPendingShops', 'CountAcceptedRequests'));
        }
    }
    public function Admin_Approve_Shop($shopid)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $s = shop::find($shopid);
            $details = [
                'title' => 'Approve Shop Request',
                'body' => 'Your shop has been Approved'
            ];
            Mail::to($s->email)->send(new sendcontactmail($details));
            shop::find($shopid)->update([
                'approve' => 1
            ]);
            return redirect()->back();
        }
    }
    public function Admin_Reject_Shop($shopid)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $s = shop::find($shopid);
            $details = [
                'title' => 'Reject Shop Request',
                'body' => 'Your shop has been Rejected due to some miss information'
            ];
            Mail::to($s->email)->send(new sendcontactmail($details));
            shop::find($shopid)->delete();
            return redirect()->back();
        }
    }
    public function Admin_Delete_Shop($shopid)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            $s = shop::find($shopid);
            $details = [
                'title' => 'Your Shop is Removed',
                'body' => 'Your shop has been Removed due to some miss information'
            ];
            Mail::to($s->email)->send(new sendcontactmail($details));
            shop::find($shopid)->delete();
            return redirect()->back();
        }
    }
    public function Admin_Category_Shop($id)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            categories::find($id)->delete();
            return redirect()->back();
        }
    }

    public function Admin_Subcategory_Shop($id)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            subcategories::find($id)->delete();
            return redirect()->back();
        }
    }

    public function Update_Category(Request $request)
    {
        $category = categories::find($request->input('id'));
        $category->name = $request->input('category');
        $category->save();
        return redirect()->back();
    }

    public function Admin_Product($id)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {
            products::find($id)->delete();
            return redirect()->back();
        }
    }

    public function Update_Admin_Profile(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        } else {

            // Validation
            $request->validate([
                'name' => 'required',
                'gender' => 'required',
                'phoneno' => 'integer|size:11',
                'address' => 'required',
                'password' => 'required|min:5|max:30',
            ]);

            $admin = admin::find(session()->get('admin_id'));
            $admin->name = $request->input('name');
            session()->forget('admin_name');
            session()->put('admin_name', $request->input('name'));
            $admin->gender = $request->input('gender');
            $admin->phoneno = $request->input('phoneno');
            $admin->address = $request->input('address');

            if ($admin->password == $request->input('password')) {
                $admin->save();
            } else {
                $admin->password = $request->input('password');
                $admin->save();
                session()->forget('admin_id');
                session()->forget('admin_name');

                return redirect('admin_login')->with('success', 'Profile Updated Successfully');
            }
            return redirect()->back()->with('success', 'Profile Updated Successfully');
        }
    }
}
