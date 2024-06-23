<?php

namespace Basketin\Paymob\Configs;

class AmountToCent
{
    public function __construct(
        public int|float $amount = 0
    ) {
        $this->amount = $amount * 100;
    }

    public function getAmount(): int|float
    {
        return $this->amount;
    }
}
