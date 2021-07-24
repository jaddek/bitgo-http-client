<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Jaddek\Bitgo\Http\Client\Response\Wallet\MaximumSpendable;

/**
 * @property WalletInterface $client
 */
final class MaximumSpendableProvider extends AbstractProvider
{
    public function __invoke(string $coin, string $walletId): MaximumSpendable
    {
        $this->logger->debug(sprintf('%s:%s: get maximum spendable', __CLASS__, __FUNCTION__), [
            'coin'    => $coin,
            'wallet'  => $walletId,
        ]);

        $response = $this->client->maximumSpendable($coin, $walletId);

        return new MaximumSpendable($response->toArray());
    }
}