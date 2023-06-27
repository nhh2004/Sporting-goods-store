<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayPal extends Model
{
    protected $table = 'paypal';

    protected $fillable = ['payment_id', 'payer_id'];

    // Các phương thức và quan hệ khác trong mô hình
}
