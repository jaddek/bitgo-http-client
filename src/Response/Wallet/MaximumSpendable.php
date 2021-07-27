<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Wallet;

final class MaximumSpendable
{
    private ?string $maximumSpendable;
    private ?string $coin;

    public function __construct(array $data)
    {
        $this->maximumSpendable = (isset($data['maximumSpendable']) && is_string($data['maximumSpendable'])) ? $data['maximumSpendable'] : null;
        $this->coin             = (isset($data['coin']) && is_string($data['coin'])) ? $data['coin'] : null;
    }

    /**
     * @return string|null
     */
    public function getMaximumSpendable(): ?string
    {
        return $this->maximumSpendable;
    }

    public function getIntMaximumSpendable(): ?int
    {
        return (int)$this->maximumSpendable;
    }

    public function getCoin(): ?string
    {
        return $this->coin;
    }
}