<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Webhook;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;

class RemoveWalletWebhookProvider
{
    public function __construct(
        private WebhookInterface $client,
    )
    {
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function __invoke(string $coin, string $walletId): void
    {
        $this->client->removeWalletWebhook($coin, $walletId);
    }
}