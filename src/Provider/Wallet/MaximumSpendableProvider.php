<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Jaddek\Bitgo\Http\Client\Response\Wallet\MaximumSpendable;
use Psr\Log\LoggerInterface;

class MaximumSpendableProvider
{
    public function __construct(
        private WalletInterface $client,
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(string $coin, string $walletId): MaximumSpendable
    {
        $this->logger->info(sprintf('%s:%s: get maximum spendable', __CLASS__, __FUNCTION__), [
            'coin'    => $coin,
            'wallet'  => $walletId,
        ]);

        $response = $this->client->maximumSpendable($coin, $walletId);

        return new MaximumSpendable($response->toArray());
    }
}