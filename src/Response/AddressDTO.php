<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response;

class AddressDTO
{
    private string $id;
    private string $address;
    private ?int $chain;
    private ?int $index;
    private string $coin;
    private string $wallet;
    private array $coinSpecific;
    private string $label;

    public function __construct(array $data)
    {
        $this->id           = (string)($data['id'] ?? '');
        $this->address      = (string)($data['address'] ?? '');
        $this->chain        = isset($data['chain']) ? (int)$data['chain'] : null;
        $this->index        = isset($data['index']) ? (int)$data['index'] : null;
        $this->coin         = (string)($data['coin'] ?? '');
        $this->wallet       = (string)($data['wallet'] ?? '');
        $this->coinSpecific = (array)($data['coinSpecific'] ?? []);
        $this->label        = (string)($data['label'] ?? '');
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getChain(): ?int
    {
        return $this->chain;
    }

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function getCoin(): string
    {
        return $this->coin;
    }

    public function getWallet(): string
    {
        return $this->wallet;
    }

    public function getCoinSpecific(): array
    {
        return $this->coinSpecific;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}
