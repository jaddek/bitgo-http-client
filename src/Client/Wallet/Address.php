<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractClient;
use Symfony\Contracts\HttpClient\ResponseInterface;;

class Address extends AbstractClient implements AddressInterface
{
    public function create(string $coin, string $walletId, string $label = null, array $body = []): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/address', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('POST', $url, [
            'json' => array_merge($body, ['label' => $label]),
        ]);
    }

    public function get(string $coin, string $walletId, string $addressOrId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/address', [
            '{coin}'        => $coin,
            '{walletId}'    => $walletId,
            '{addressOrId}' => $addressOrId,
        ]);

        return $this->bitgoClient->request('GET', $url);
    }
}
