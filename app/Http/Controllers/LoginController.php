<?php

namespace App\Http\Controllers;

use App\Models\Bill_khachhang;
use App\Models\CTHD;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
     public function index(){
         return view('login', [
             'title' => 'Login to SportswearShop system'
         ]);
     }

     public function store(Request $request)
     {
         $this->validate($request, [
             'email' => 'required|email:filter|max:255',
             'password' => 'required|max:255'
         ]);
    
         $customer = Customer::where('email', $request->input('email'))->first();
    
         if ($customer && Hash::check($request->input('password'), $customer->password)) {
             FacadesSession::put('customerEmail', $customer->email);
             FacadesSession::put('customerName', $customer->name);
             FacadesSession::put('customerId', $customer->id);
             FacadesSession::put('phone', $customer->phone);
             FacadesSession::put('address', $customer->address);
             return redirect('/');
         } else {
             FacadesSession::flash('error', 'Invalid login, please try again');
             return redirect()->back();
         }
     }

     public function registerAuth(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required',
             'email' => 'required|email|max:255|unique:customers',
             'phone' => 'required',
             'password' => 'required|min:6'
         ], [
             'name.required' => 'Please enter your first and last name',
             'phone.required' => 'Please enter phone number',
             'email.required' => 'Please enter email address',
             'email.unique' => 'Email already exists'
         ]);
    
         $customer = new Customer;
         $customer->name = $validatedData['name'];
         $customer->email = $validatedData['email'];
         $customer->password = bcrypt($validatedData['password']);
         $customer->phone = $validatedData['phone'];
         $customer->address = json_encode(['Address 1', 'Address 2', 'Address 3']); // Convert array to JSON string
         $customer->save();
    
         return redirect()->back()->with('success', 'Registration successful');
     }
    
    
     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect()->back();
     }
     public function profile($customerId) {
         $customer = Customer::where('id', $customerId)->get();

         return view('profile', [
             'title' => 'Account info',
             'customer' => $customer
         ]);
     }

     public function myOrder()
     {
         $customerId = auth()->id();
         $orders = Bill_khachhang::where('customer_id', $customerId)->get();
         return view('my-order', [
             'title' => 'My order',
             'orders' => $orders,
         ]);
     }

     public function myOrderDetail($orderId) {
         return view('my-order-detail', [
             'title' => 'Order details',
             'order' => Bill_khachhang::where('id', $orderId)->first(),
             'cthds' => CTHD::with(['product' => function($query) {
                     $query->select('id', 'name','menu_id', 'image', 'original_price', 'price_sale');}])->where('id', $orderId)->get()
         ]);
     }
}