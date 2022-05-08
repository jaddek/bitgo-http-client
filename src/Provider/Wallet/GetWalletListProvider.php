<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Psr\Log\LoggerInterface;

class GetWalletListProvider
{
    public function __construct(
        private WalletInterface $client,
        private LoggerInterface $logger
    )
    {
    }
    public function __invoke(string $coin): array
    {
        $this->logger->debug(sprintf('%s:%s: get list of wallets', __CLASS__, __FUNCTION__), [
            'coin'    => $coin,
        ]);

        $response = $this->client->getList($coin);

        return $response->toArray();
    }
}