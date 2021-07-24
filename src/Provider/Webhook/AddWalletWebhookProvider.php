<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Webhook;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\WebhookInterface;
use Jaddek\Bitgo\Http\Client\Request\Webhook\Endpoint;

/**
 * @property WebhookInterface $client
 */
final class AddWalletWebhookProvider extends AbstractProvider
{
    public function __invoke(string $coin, string $walletId, Endpoint $endpoint): array
    {
        $response = $this->client->addWalletWebhook($coin, $walletId, $endpoint->toBody());

        return $response->toArray(false);
    }
}