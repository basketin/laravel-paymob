<?php

namespace OutMart\Paymob;

use OutMart\Paymob\Flow\Authentication;
use OutMart\Paymob\Flow\OrderRegistration;
use OutMart\Paymob\Flow\PaymentKeysRequest;

class Pay
{
    protected $method = null;
    protected $amount = null;

    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function getLink()
    {
        $config = config('paymob.payments.' . $this->method);

        $responseAuthentication = new Authentication($config['api_key']);
        $authenticationToken = $responseAuthentication->call();

        $responseOrderRegistration = new OrderRegistration($authenticationToken, $this->amount);
        $orderId = $responseOrderRegistration->call();

        $responsePaymentKeysRequest = new PaymentKeysRequest(
            $authenticationToken,
            $this->amount,
            $orderId,
            $config['integration_id']);
        $paymentToken = $responsePaymentKeysRequest->call();

        return 'https://accept.paymobsolutions.com/api/acceptance/iframes/' . $config['iframe_id'] . '?payment_token=' . $paymentToken;
    }
}
