<?php

namespace Basketin\Paymob;

use Basketin\Paymob\Configs\AmountToCent;
use Basketin\Paymob\Configs\PaymentMethod;
use Basketin\Paymob\Flow\CallPaymobTask;
use Basketin\Paymob\Flow\GenerateLinkTask;
use Basketin\Paymob\Flow\SavePaymentRecordTask;
use Basketin\Paymob\PaymentInit;
use Illuminate\Support\Facades\Pipeline;

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
    public function setMethod(PaymentMethod $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount(AmountToCent $amount)
    {
        $this->amount = $amount->getAmount();

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
        return Pipeline::send(new PaymentInit($this->method, $this->getAmount(), $this->merchantOrderId))
            ->through([
                CallPaymobTask::class,
                SavePaymentRecordTask::class,
                GenerateLinkTask::class,
            ])
            ->thenReturn();
    }
}
