<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Jaddek\Bitgo\Http\Client\Response\Wallet\TransferList;

/**
 * @property WalletInterface $client
 */
final class TransferListProvider extends AbstractProvider
{
    public function __invoke(string $coin, string $walletId): TransferList
    {
        $this->logger->debug(sprintf('%s:%s: get transfer list', __CLASS__, __FUNCTION__), [
            'coin'    => $coin,
            'wallet'  => $walletId,
        ]);

        $response = $this->client->getTransferList($coin, $walletId);

        return new TransferList($response->toArray());
    }
}