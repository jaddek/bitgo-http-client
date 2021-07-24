<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Jaddek\Bitgo\Http\Client\Response\Transfer\Payment;

/**
 * @property WalletInterface $client
 */
final class SendCoinsProvider extends AbstractProvider
{
    public function __invoke(string $coin, string $walletId, string $address, string $amount, string $sequenceId, string $passphrase = null): Payment
    {
        $this->logger->debug(sprintf('%s:%s: send coins %s', __CLASS__, __FUNCTION__, $amount), [
            'amount'     => $amount,
            'coin'       => $coin,
            'wallet'     => $walletId,
            'address'    => $address,
            'sequenceId' => $sequenceId,
        ]);

        $response = $this->client->send($coin, $walletId, [
            'address'          => $address,
            'amount'           => $amount,
            'walletPassphrase' => $passphrase,
            'sequenceId'       => $sequenceId,
        ]);

        $data = $response->toArray();

        $this->logger->debug(sprintf('%s: send coins accomplished', __CLASS__), $data);

        return new Payment($data);
    }
}