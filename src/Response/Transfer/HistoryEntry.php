<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Transfer;

class HistoryEntry
{
    private $date;
    private $action;
    private $comment;

    public function __construct(array $data)
    {
        $this->date = $data['date'] ?? null;
        $this->action = $data['action'] ?? null;
        $this->comment = $data['comment'] ?? null;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
