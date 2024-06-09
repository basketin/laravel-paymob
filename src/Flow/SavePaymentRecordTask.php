<?php

namespace Basketin\Paymob\Flow;

use Basketin\Paymob\Models\Transaction;
use Basketin\Paymob\PaymentInit;
use Closure;

class SavePaymentRecordTask
{
    public function handle(PaymentInit $paymentInit, Closure $next)
    {
        Transaction::create([
            'merchant_order_id' => $paymentInit->getMerchantOrderId(),
            'paymob_order_id' => $paymentInit->getOrderId(),
            'payment_method' => $paymentInit->getPaymentMethod()->getPaymentMethod(),
            'amount' => $paymentInit->getAmount(),
        ]);

        return $next($paymentInit);
    }
}
