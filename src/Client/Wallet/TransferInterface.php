<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Symfony\Contracts\HttpClient\ResponseInterface;;

interface TransferInterface
{
    public function get(string $coin, string $walletId, string $transferId): ResponseInterface;
}