<?php

namespace Basketin\Paymob\Flow;

use Basketin\Paymob\Flow\Requests\AuthenticationRequest;
use Basketin\Paymob\Flow\Requests\OrderRegistrationRequest;
use Basketin\Paymob\Flow\Requests\PaymentKeysRequest;
use Basketin\Paymob\PaymentInit;
use Closure;

class CallPaymobTask
{
    public function handle(PaymentInit $paymentInit, Closure $next)
    {
        $responseAuthentication = new AuthenticationRequest($paymentInit->getPaymentMethod()->getApiKey());
        $authenticationToken = $responseAuthentication->call();

        $responseOrderRegistration = new OrderRegistrationRequest($authenticationToken, $paymentInit->getAmount());
        $orderId = $responseOrderRegistration->call();

        $responsePaymentKeysRequest = new PaymentKeysRequest(
            $authenticationToken,
            $paymentInit->getAmount(),
            $orderId,
            $paymentInit->getPaymentMethod()->getIntegrationId(),
        );

        $paymentToken = $responsePaymentKeysRequest->call();

        $paymentInit->setOrderId($orderId);
        $paymentInit->setPaymentToken($paymentToken);

        return $next($paymentInit);
    }
}
