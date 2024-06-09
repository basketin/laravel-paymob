<?php

namespace Basketin\Paymob\Flow;

use Komtcho\Shot\Contracts\ShootingPost;
use Komtcho\Shot\Shooting;

class PaymentKeysRequest extends Shooting implements ShootingPost
{
    protected $url = 'https://accept.paymob.com/api/acceptance/payment_keys';

    private $apiKey;
    private $amount;
    private $orderId;
    private $integrationId;

    public function __construct($apiKey, $amount, $orderId, $integrationId)
    {
        $this->apiKey = $apiKey;
        $this->amount = $amount;
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
            // "billing_data" => [
            //     "apartment" => "803",
            //     "email" => "claudette09@exa.com",
            //     "floor" => "42",
            //     "first_name" => "Clifford",
            //     "street" => "Ethan Land",
            //     "building" => "8028",
            //     "phone_number" => "+86(8)9135210487",
            //     "shipping_method" => "PKG",
            //     "postal_code" => "01898",
            //     "city" => "Jaskolskiburgh",
            //     "country" => "CR",
            //     "last_name" => "Nicolas",
            //     "state" => "Utah",
            // ],
            "currency" => "EGP",
            'integration_id' => $this->integrationId,
        ];
    }

    public function response($body)
    {
        return $body['token'];
    }
}
