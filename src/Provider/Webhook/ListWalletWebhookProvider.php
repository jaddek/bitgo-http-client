<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Webhook;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;
use Jaddek\Bitgo\Http\Client\Response\Webhook\Endpoint;

class ListWalletWebhookProvider
{
    public function __construct(
        private WebhookInterface $client,
    )
    {
    }

    public function __invoke(string $coin, string $walletId): array
    {
        $response = $this->client->listWalletWebhook($coin, $walletId);

        foreach ($response->toArray()['webhooks'] ?? [] as $webhook) {
            $data[] = new Endpoint($webhook);
        }

        return $data ?? [];
    }
}