<?php

namespace Basketin\Paymob\Http\Controllers;

use Illuminate\Http\Request;
use Basketin\Paymob\Events\PayMobPaymentFailed;
use Basketin\Paymob\Events\PayMobPaymentSuccess;
use Basketin\Paymob\Models\Transaction;

class CallbackController
{
    public function processed(Request $request)
    {
        return $this->transaction($request->obj);
    }

    public function response(Request $request)
    {
        return $this->transaction($request->obj);
    }

    private function transaction($obj)
    {
        $transaction = Transaction::where('paymob_order_id', $obj['order']['id'])->first();

        // success
        if ($obj['success']) {

            $transaction->status = 'success';
            $transaction->save();

            PayMobPaymentSuccess::dispatch($transaction);
            return 'The transaction has been paid';
        }

        // not success
        if (!$obj['success']) {

            $transaction->status = 'failed';
            $transaction->save();

            PayMobPaymentFailed::dispatch($transaction);
            return 'The transaction not has been paid';
        }
    }
}
