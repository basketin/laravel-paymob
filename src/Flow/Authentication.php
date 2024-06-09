<?php

namespace Basketin\Paymob\Flow;

use Komtcho\Shot\Contracts\ShootingPost;
use Komtcho\Shot\Shooting;

class Authentication extends Shooting implements ShootingPost
{
    protected $url = 'https://accept.paymob.com/api/auth/tokens';

    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function body(): array
    {
        return [
            'api_key' => $this->apiKey,
        ];
    }

    public function response($body)
    {
        return $body['token'];
    }
}
