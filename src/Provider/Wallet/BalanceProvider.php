<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Psr\Log\LoggerInterface;

final class BalanceProvider
{
    public function __construct(
        private WalletInterface $client,
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(
        string  $coin,
        ?string $labelContains = null,
        ?array  $type = null,
        ?bool   $expandCustodialWallet = null,
        ?bool   $deleted = null,
        ?array  $enterprise = null,
        ?array  $id = null,
    ): array
    {
        $data = compact('coin', 'labelContains', 'type', 'expandCustodialWallet', 'deleted', 'enterprise', 'id');

        $this->logger->debug(sprintf('%s:%s: get list of wallets', __CLASS__, __FUNCTION__), $data);

        $query = array_filter($data, static function ($value): bool {
            return !empty($value);
        });


        $response = $this->client->balances($query);

        return $response->toArray();
    }
}