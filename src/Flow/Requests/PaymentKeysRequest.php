<?php

namespace Basketin\Paymob\Flow\Requests;

use Komtcho\Shot\Contracts\ShootingPost;
use Komtcho\Shot\Shooting;

class PaymentKeysRequest extends Shooting implements ShootingPost
{
    protected $url = 'https://accept.paymob.com/api/acceptance/payment_keys';

    private $apiKey;
    private $amount;
    private $billingData;
    private $orderId;
    private $integrationId;

    public function __construct($apiKey, $amount, $billingData, $orderId, $integrationId)
    {
        // dd($apiKey, $amount, $orderId, $integrationId);
        $this->apiKey = $apiKey;
        $this->amount = $amount;
        $this->billingData = $billingData;
        $this->orderId = $orderId;
        $this->integrationId = $integrationId;
    }

    public function body(): array
    {
        return [
            'auth_token' => $this->apiKey,
            'amount_cents' => $this->amount,
            'expiration' => 3600,
            'order_id' => $this->orderId,
            "billing_data" => [
                "building" => $this->billingData->getBuilding(),
                "apartment" => $this->billingData->getApartment(),
                "floor" => $this->billingData->getFloor(),
                "first_name" => $this->billingData->getFirstName(),
                "last_name" => $this->billingData->getLastName(),
                "phone_number" => $this->billingData->getPhoneNumber(),
                "email" => $this->billingData->getEmail(),
                "shipping_method" => $this->billingData->getShippingMethod(),
                "city" => $this->billingData->getCity(),
                "country" => $this->billingData->getCountry(),
                "state" => $this->billingData->getState(),
                "postal_code" => $this->billingData->getPostalCode(),
                "street" => $this->billingData->getStreet(),
            ],
            "currency" => "EGP",
            'integration_id' => $this->integrationId,
        ];
    }

    public function response($body)
    {
        return $body['token'];
    }
}
