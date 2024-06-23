<?php

namespace Basketin\Paymob\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'basketin_paymob_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_order_reference',
        'paymob_order_id',
        'payment_method',
        'amount',
    ];
}
