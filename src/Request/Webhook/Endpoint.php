<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Request\Webhook;

final class Endpoint
{
    private $type;
    private $allToken = false;
    private $url;
    private $label;
    private $numConfirmation = 0;
    private $listenToFailureStates = true;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getAllToken()
    {
        return $this->allToken;
    }

    public function setAllToken($allToken): void
    {
        $this->allToken = $allToken;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label): void
    {
        $this->label = $label;
    }

    public function getNumConfirmation()
    {
        return $this->numConfirmation;
    }

    public function setNumConfirmation($numConfirmation): void
    {
        $this->numConfirmation = $numConfirmation;
    }

    public function getListenToFailureStates()
    {
        return $this->listenToFailureStates;
    }

    public function setListenToFailureStates($listenToFailureStates): void
    {
        $this->listenToFailureStates = $listenToFailureStates;
    }

    public function toBody(): array
    {
        return [
            'type'                  => $this->getType(),
            'allToken'              => $this->getAllToken(),
            'url'                   => $this->getUrl(),
            'label'                 => $this->getLabel(),
            'numConfirmations'      => $this->getNumConfirmation(),
            'listenToFailureStates' => $this->getListenToFailureStates(),
        ];
    }
}