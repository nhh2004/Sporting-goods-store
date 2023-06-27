<?php


namespace App\Http\Services\Order;

use App\Models\Bill_khachhang;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderService 
{
    public function getOrder() {
        return Bill_khachhang::orderByDesc('created_at')->get();
    }

    public function update($request, $order) {
        try {
            $order->fill($request->input());
            $order->save();
            Session::flash('success', 'Update successful');
        } catch (\Exception $err) {
            Session::flash('error', 'Update bug');
            return false;
        }

        return true;
    }
}