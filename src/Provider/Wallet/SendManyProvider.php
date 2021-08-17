<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Wallet;

use Jaddek\Bitgo\Http\Client\Client\Wallet\WalletInterface;
use Jaddek\Bitgo\Http\Client\Response\Transfer\Payment;
use Psr\Log\LoggerInterface;

final class SendManyProvider
{
    public function __construct(
        private WalletInterface $client,
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(string $coin, string $walletId, array $recipients, string $sequenceId, string $passphrase = null, string $comment = ''): Payment
    {
        $this->logger->info(sprintf('%s:%s: send coins to many', __CLASS__, __FUNCTION__), [
            'recipients' => $recipients,
            'coin'       => $coin,
            'wallet'     => $walletId,
            'sequenceId' => $sequenceId,
            'comment'    => $comment,
        ]);

        $response = $this->client->sendMany($coin, $walletId, [
            'recipients'       => $recipients,
            'walletPassphrase' => $passphrase,
            'sequenceId'       => $sequenceId,
            'comment'          => $comment,
        ]);

        $data = $response->toArray();

        $this->logger->debug(sprintf('%s: send coins accomplished', __CLASS__), $data);

        return new Payment($data);
    }
}
