<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result ===false){
            return redirect()->back();
        }

        return redirect()->back();
        
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
        // Session::forget('carts');
    }

    public function update(Request $request){
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($id){
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    public function removeInHome($id){
        $this->cartService->removeInHome($id);
        return redirect()->back();
    }
    

    public function addCart(Request $request){
        $this -> validate($request, [
            'address' => 'required|max:255'
        ]);
        $this->cartService->addCart($request);

        return redirect()->back();
    }


    public function registerCheckout(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required',
            'password' => 'required|min:6'
        ], [
            'name' => 'Vui lòng nhập họ và tên',
            'phone' => 'Vui lòng nhập số điện thoại',
            'email' => 'Vui lòng nhập địa chỉ email',
            'email.unique' => 'Email đã tồn tại'
        ]);
    
        $data = $request->all();
    
        Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone']
        ]);
    
        return redirect('/login-checkout')->with('success', 'Đăng ký thành công');
    }
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter|max:255',
            'password' => 'required|max:255'
        ]);
    
        $email = $request->input('email');
        $password = $request->input('password');
    
        $customer = Customer::where('email', $email)->first();
    
        if ($customer && password_verify($password, $customer->password)) {
            Session::put('email', $customer->email);
            Session::put('name', $customer->name);
            Session::put('phone', $customer->phone);
            Session::put('customerId', $customer->id);
            
            return redirect('/carts');
        } else {
            Session::flash('error', 'Đăng nhập sai, vui lòng thử lại');
            return redirect('/');
        }
    }
}
