<?php

namespace OutMart\Paymob\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'outmart_paymob_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_order_id',
        'paymob_order_id',
        'payment_method',
        'amount',
    ];
}
