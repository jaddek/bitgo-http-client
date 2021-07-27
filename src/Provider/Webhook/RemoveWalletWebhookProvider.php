<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Webhook;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;
use Psr\Log\LoggerInterface;

final class RemoveWalletWebhookProvider
{
    public function __construct(
        private WebhookInterface $client,
        private LoggerInterface $logger
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