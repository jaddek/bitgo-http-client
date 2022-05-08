<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Jaddek\Bitgo\Http\Client\Response\Transfer\Payment;
use Psr\Log\LoggerInterface;

class SendCoinsProvider
{
    public function __construct(
        private WalletInterface $client,
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(string $coin, string $walletId, string $address, int $amount, string $sequenceId, string $passphrase = null, string $comment = ''): Payment
    {
        $this->logger->info(sprintf('%s:%s: send coins %s', __CLASS__, __FUNCTION__, $amount), [
            'amount'     => $amount,
            'coin'       => $coin,
            'wallet'     => $walletId,
            'address'    => $address,
            'sequenceId' => $sequenceId,
            'comment'    => $comment,
        ]);

        $response = $this->client->send($coin, $walletId, [
            'address'          => $address,
            'amount'           => $amount,
            'walletPassphrase' => $passphrase,
            'sequenceId'       => $sequenceId,
            'comment'          => $comment,
        ]);


        $data = $response->toArray();

        $this->logger->debug(sprintf('%s: send coins accomplished', __CLASS__), $data);

        return new Payment($data);
    }
}
