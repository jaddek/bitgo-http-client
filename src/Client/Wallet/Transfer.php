<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractClient;
use Symfony\Contracts\HttpClient\ResponseInterface;;

class Transfer extends AbstractClient implements TransferInterface
{
    public function get(string $coin, string $walletId, string $transferId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/transfer/{transferId}?allTokens=true', [
            '{coin}'       => $coin,
            '{walletId}'   => $walletId,
            '{transferId}' => $transferId,
        ]);

        return $this->bitgoClient->request('GET', $url);
    }
}
