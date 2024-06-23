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
        'payment_method',
        'api_key',
        'integration_id',
        'iframe_id',
    ];
}
