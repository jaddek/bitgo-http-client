<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractClient;
use Symfony\Contracts\HttpClient\ResponseInterface;;

class Webhook extends AbstractClient implements WebhookInterface
{
    /**
     * @param string $coin
     * @param string $walletId
     * @param array $body
     * @return ResponseInterface
     * @throws \Symfony\Contracts\bitgoClient\Exception\TransportExceptionInterface
     */
    public function addWalletWebhook(string $coin, string $walletId, array $body): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/webhooks', [
            '{coin}'     => $coin,
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('POST', $url, [
            'json'    => $body,
        ]);
    }

    /**
     * @param string $coin
     * @param string $walletId
     * @return ResponseInterface
     * @throws \Symfony\Contracts\bitgoClient\Exception\TransportExceptionInterface
     */
    public function listWalletWebhook(string $coin, string $walletId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/webhooks', [
            '{coin}'     => $coin,
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('GET', $url);
    }

    /**
     * @param string $coin
     * @param string $walletId
     * @return ResponseInterface
     * @throws \Symfony\Contracts\bitgoClient\Exception\TransportExceptionInterface
     */
    public function removeWalletWebhook(string $coin, string $walletId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/webhooks', [
            '{coin}'     => $coin,
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('DELETE', $url);
    }
}