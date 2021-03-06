<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Webhook;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;
use Jaddek\Bitgo\Http\Client\Request\Webhook\Endpoint;

class AddWalletWebhookProvider
{
    public function __construct(
        private WebhookInterface $client,
    )
    {
    }

    public function __invoke(string $coin, string $walletId, Endpoint $endpoint): array
    {
        $response = $this->client->addWalletWebhook($coin, $walletId, $endpoint->toBody());

        return $response->toArray(false);
    }
}