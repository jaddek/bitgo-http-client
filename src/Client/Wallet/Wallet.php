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
     */
    public function send(string $coin, string $walletId, array $body): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/sendcoins', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('POST', $url, [
            'json' => $body,
        ]);
    }

    /**
     * @param string $coin
     * @param string $walletId
     * @return ResponseInterface
     */
    public function maximumSpendable(string $coin, string $walletId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/maximumSpendable', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('GET', $url);
    }

    /**
     * @param string $coin
     * @param string $walletId
     * @return ResponseInterface
     */
    public function getTransferList(string $coin, string $walletId): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/transfer', [
            '{coin}'     => $coin,
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('GET', $url);
    }

    /**
     * @param string $coin
     * @return ResponseInterface
     */
    public function getList(string $coin): ResponseInterface
    {
        $url = strtr('{coin}/wallet', [
            '{coin}' => $coin,
        ]);

        return $this->bitgoClient->request('GET', $url);
    }

    public function sendMany(string $coin, string $walletId, array $body): ResponseInterface
    {
        $url = strtr('{coin}/wallet/{walletId}/sendmany', [
            '{coin}'     => strtolower($coin),
            '{walletId}' => $walletId,
        ]);

        return $this->bitgoClient->request('POST', $url, [
            'json' => $body,
        ]);
    }

    public function balances(array $query): ResponseInterface
    {
        $url = strtr('/api/v2/wallet/balances?{query}', [
            '{query}' => http_build_query($query)
        ]);

        return $this->bitgoClient->request('GET', $url);
    }
}
