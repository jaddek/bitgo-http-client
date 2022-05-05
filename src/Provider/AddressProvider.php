<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider;

use Jaddek\Bitgo\Http\Client\Client\Wallet\AddressInterface;
use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;
use Jaddek\Bitgo\Http\Client\Response\AddressDTO;
use Psr\Log\LoggerInterface;

class AddressProvider
{
    public function __construct(
        private AddressInterface $client,
    )
    {
    }

    public function create(string $coin, string $walletId, ?string $label = null): AddressDTO
    {
        $response = $this->client->create($coin, $walletId, $label);

        return new AddressDTO($response->toArray());
    }
}
