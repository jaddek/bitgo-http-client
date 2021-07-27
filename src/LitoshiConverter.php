<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client;

class LitoshiConverter
{
    private const LITOSHI_IN_LITECOIN = 100000000;

    public static function convertToMillions(float $amount): int
    {
        return (int)($amount * self::LITOSHI_IN_LITECOIN);
    }

    public static function convertToDecimal(int $amount): int|float
    {
        return $amount / self::LITOSHI_IN_LITECOIN;
    }
}