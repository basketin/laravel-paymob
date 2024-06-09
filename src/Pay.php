<?php

namespace Basketin\Paymob;

use Basketin\Paymob\Flow\Authentication;
use Basketin\Paymob\Flow\OrderRegistration;
use Basketin\Paymob\Flow\PaymentKeysRequest;
use Basketin\Paymob\Models\Transaction;

class Pay
{
    protected $method = null;
    protected $amount = null;
    protected $merchantOrderId = null;

    /**
     * Set the value of method
     *
     * @return  self
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set the value of merchantOrderId
     *
     * @return  self
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;

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

        Transaction::create([
            'merchant_order_id' => $this->merchantOrderId,
            'paymob_order_id' => $orderId,
            'payment_method' => $this->method,
            'amount' => $this->amount,
        ]);

        return 'https://accept.paymobsolutions.com/api/acceptance/iframes/' . $config['iframe_id'] . '?payment_token=' . $paymentToken;
    }
}
