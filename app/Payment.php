<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    public $table = 'payments';
    public $fillable = ['receipt_id','razorpay_order_id','razorpay_payment_id','razorpay_signature'];
}
