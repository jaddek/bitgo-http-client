<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface AddressInterface
{
    public function create(string $coin, string $walletId, string $label, array $body = []): ResponseInterface;

    public function get(string $coin, string $walletId, string $addressOrId): ResponseInterface;
}