<?php

namespace Basketin\Paymob;

use Basketin\Paymob\Configs\PaymentMethod;

class PaymentInit
{
    private $paymentMethod = null;
    private $amount = null;
    private $merchantOrderId = null;
    private $token = null;
    private $orderId = null;
    private $paymentToken = null;

    public function __construct(PaymentMethod $paymentMethod, int $amount, string $merchantOrderId)
    {
        $this->paymentMethod = $paymentMethod;
        $this->amount = $amount;
        $this->merchantOrderId = $merchantOrderId;
    }

    /**
     * Get the value of paymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the value of merchantOrderId
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of orderId
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of paymentToken
     */
    public function getPaymentToken()
    {
        return $this->paymentToken;
    }

    /**
     * Set the value of paymentToken
     *
     * @return  self
     */
    public function setPaymentToken($paymentToken)
    {
        $this->paymentToken = $paymentToken;

        return $this;
    }
}
