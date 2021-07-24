<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Webhook;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;

/**
 * @property WebhookInterface $client
 */
final class RemoveWalletWebhookProvider extends AbstractProvider
{
    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function __invoke(string $coin, string $walletId): void
    {
        $this->client->removeWalletWebhook($coin, $walletId);
    }
}