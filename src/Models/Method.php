<?php

namespace Basketin\Paymob\Models;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $table = 'basketin_paymob_methods';

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
