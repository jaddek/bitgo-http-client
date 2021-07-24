<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Wallet extends AbstractClient implements WalletInterface
{
    /**
     * @param string $coin
     * @param string $walletId
     * @param array $body
     * @return ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function send(string $coin, string $walletId, array $body): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/sendcoins', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->httpClient->request('POST', $url, [
            'json' => $body,
        ]);
    }

    /**
     * @param string $coin
     * @param string $walletId
     * @return ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function maximumSpendable(string $coin, string $walletId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/maximumSpendable', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->httpClient->request('GET', $url);
    }

    /**
     * @param string $coin
     * @param string $walletId
     * @return ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getTransferList(string $coin, string $walletId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/transfer', [
            '{coin}'     => $coin,
            '{walletId}' => $walletId,
        ]);

        return $this->httpClient->request('GET', $url);
    }

    /**
     * @param string $coin
     * @return ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getList(string $coin): ResponseInterface
    {
        $url = strtr('{coin}/wallet', [
            '{coin}' => $coin,
        ]);

        return $this->httpClient->request('GET', $url);
    }
}
