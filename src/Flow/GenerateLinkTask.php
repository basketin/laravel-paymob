<?php

namespace Basketin\Paymob\Flow;

use Basketin\Paymob\PaymentInit;
use Closure;

class GenerateLinkTask
{
    public function handle(PaymentInit $paymentInit, Closure $next)
    {
        $link = 'https://accept.paymobsolutions.com/api/acceptance/iframes/' . $paymentInit->getPaymentMethod()->getIframeId() . '?payment_token=' . $paymentInit->getPaymentToken();

        return $next($link);
    }
}
