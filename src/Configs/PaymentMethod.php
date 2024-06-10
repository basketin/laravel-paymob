<?php

namespace Basketin\Paymob\Configs;

use Basketin\Paymob\Models\Method;

class PaymentMethod
{
    public $apiKey = null;
    public $integrationId = null;
    public $iframeId = null;

    public function __construct(public string $paymentMethod)
    {
        if ($configPayment = config('basketin.paymob.payments.' . $paymentMethod)) {
            $this->apiKey = $configPayment['api_key'];
            $this->integrationId = $configPayment['integration_id'];
            $this->iframeId = $configPayment['iframe_id'];
        }

        if ($payment = Method::where('payment_method', $paymentMethod)->first()) {
            $this->apiKey = $payment->api_key;
            $this->integrationId = $payment->integration_id;
            $this->iframeId = $payment->iframe_id;
        }
    }

    /**
     * Get the value of paymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Get the value of apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Get the value of integrationId
     */
    public function getIntegrationId()
    {
        return $this->integrationId;
    }

    /**
     * Get the value of iframeId
     */
    public function getIframeId()
    {
        return $this->iframeId;
    }
}
