<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Address extends AbstractClient implements AddressInterface
{
    /**
     * Оправляет запрос на создание адреса в кошельке
     *
     * @throws TransportExceptionInterface   When a network error occurs
     * @throws RedirectionExceptionInterface On a 3xx when $throw is true and the "max_redirects" option has been reached
     * @throws ClientExceptionInterface      On a 4xx when $throw is true
     * @throws ServerExceptionInterface      On a 5xx when $throw is true
     */
    public function create(string $coin, string $walletId, string $label, array $body = []): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/address', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->httpClient->request('POST', $url, [
            'json' => array_merge($body, ['label' => $label]),
        ]);
    }

    /**
     * Оправляет запрос на получение данных адреса в кошельке
     *
     * @throws TransportExceptionInterface   When a network error occurs
     * @throws RedirectionExceptionInterface On a 3xx when $throw is true and the "max_redirects" option has been reached
     * @throws ClientExceptionInterface      On a 4xx when $throw is true
     * @throws ServerExceptionInterface      On a 5xx when $throw is true
     */
    public function get(string $coin, string $walletId, string $addressOrId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/address', [
            '{coin}'        => $coin,
            '{walletId}'    => $walletId,
            '{addressOrId}' => $addressOrId,
        ]);

        return $this->httpClient->request('GET', $url);
    }
}
