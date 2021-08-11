<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface WalletInterface
{
    public function send(string $coin, string $walletId, array $body): ResponseInterface;

    public function maximumSpendable(string $coin, string $walletId): ResponseInterface;

    public function getTransferList(string $coin, string $walletId): ResponseInterface;

    public function getList(string $coin): ResponseInterface;

    public function sendMany(string $coin, string $walletId, array $body): ResponseInterface;
}