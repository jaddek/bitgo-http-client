<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Symfony\Contracts\HttpClient\ResponseInterface;;

interface WebhookInterface
{
    public function addWalletWebhook(string $coin, string $walletId, array $body): ResponseInterface;

    public function listWalletWebhook(string $coin, string $walletId): ResponseInterface;

    public function removeWalletWebhook(string $coin, string $walletId): ResponseInterface;
}