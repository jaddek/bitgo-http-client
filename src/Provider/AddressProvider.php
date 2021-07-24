<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Provider;

use Jaddek\Bitgo\Http\Client\AbstractProvider;
use Jaddek\Bitgo\Http\Client\Client\Wallet\AddressInterface;
use Jaddek\Bitgo\Http\Client\Response\AddressDTO;
use RuntimeException;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;

/**
 * @property AddressInterface $client
 */
class AddressProvider extends AbstractProvider
{
    public function create(string $coin, string $walletId, string $label): AddressDTO
    {
        try {
            $response = $this->client->create($coin, $walletId, $label);

            return new AddressDTO($response->toArray());
        } catch (HttpExceptionInterface $e) {
            $this->logger->debug($e->getResponse()->getContent(false));

            throw new RuntimeException('Cant create wallet address', 0, $e);
        } catch (ExceptionInterface $e) {
            $this->logger->debug($e->getMessage());

            throw new RuntimeException('Cant create wallet address', 0, $e);
        }
    }
}
