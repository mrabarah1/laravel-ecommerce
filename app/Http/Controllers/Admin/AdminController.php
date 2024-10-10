<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use Session;

class AdminController extends Controller
{
    /**
     * Fetch and display today, yesterday, month and this year orders
     */

     public function index()
     {
        // get today's orders
        $todayOrders = Order::whereDay('created_at', Carbon::today())->get();
        $yesterdayOrders = Order::whereDay('created_at', Carbon::yesterday())->get();
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->month)->get();
        $yearOrders = Order::whereYear('created_at', Carbon::now()->year)->get();

        return view('admin.index')->with([
            'todayOrders' => $todayOrders,
            'yesterdayOrders' => $yesterdayOrders,
            'monthOrders' => $monthOrders,
            'yearOrders' => $yearOrders,
        ]);
     }


    /**
     * Display the login form
     * checks if an admin is already logged in
     */
    public function login()
    {
        // check if admin is not logged in
        if(!auth()->guard('admin')->check())
        {
            return view('admin.login');
        }
        // if admin is logged in
        return redirect()->route('admin.index');
    }

    /**
     * Auth the admin
     * handles the validation and login process for admins using sessions.
     * we create a validation request for the admin php artisan make:request AuthAdminRequest
     * 
     */
    public function auth(AuthAdminRequest $request)
    {
    //    validate the data sent by the form which is the email and password
        if($request->validated())
        {
            // if its valid, we login the admin
            if(auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])){
                $request->session()->regenerate();
                return redirect()->route('admin.index');
            }else {
                return redirect()->route('admin.login')->with([
                    'error' => 'Whoops! invalid email and password'
                ]);
            }

        }
    }
   

    /**
    * Logout the admin
    * 
    *
    */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout successfully');
        return redirect()->route('admin.index');
    }


}
