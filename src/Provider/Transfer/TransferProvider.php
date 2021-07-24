<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider\Transfer;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\TransferInterface;
use Jaddek\Bitgo\Http\Client\Response\Transfer\Transfer as TransferResponse;

/**
 * @property TransferInterface $client
 */
class TransferProvider extends AbstractProvider
{
    public function get(string $coin, string $walletId, string $transferId): TransferResponse
    {
        $response = $this->client->get($coin, $walletId, $transferId);

        $this->logger->debug(sprintf('%s:%s', __CLASS__, __FUNCTION__), [
            'coin'       => $coin,
            'walletId'   => $walletId,
            'transferId' => $transferId,
            'response'   => $response->getContent(false),
        ]);

        return new TransferResponse($response->toArray());
    }
}
