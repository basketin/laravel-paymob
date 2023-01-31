<?php

namespace OutMart\Paymob\Flow;

use Komtcho\Shot\Contracts\ShootingPost;
use Komtcho\Shot\Shooting;

class OrderRegistration extends Shooting implements ShootingPost
{
    protected $url = 'https://accept.paymob.com/api/ecommerce/orders';

    private $apiKey;
    private $amount;

    public function __construct($apiKey, $amount)
    {
        $this->apiKey = $apiKey;
        $this->amount = $amount;
    }

    public function body(): array
    {
        return [
            'auth_token' => $this->apiKey,
            'delivery_needed' => false,
            'amount_cents' => $this->amount,
        ];
    }

    public function response($body)
    {
        return $body['id'];
    }
}
