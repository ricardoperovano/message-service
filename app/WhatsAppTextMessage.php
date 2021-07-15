<?php

namespace App\Models;

use App\Contracts\IBroker;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class WhatsAppTextMessage extends Message
{
    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
    }

    public function setBroker(IBroker $broker): void
    {
        $this->broker = $broker;
    }

    public function send(): array
    {
        $server = $this->broker->getServer();

        $data = $server->executeAsyncScript(
            "let callback = arguments[arguments.length - 1];" .
                "window.sendMessage('" .
                $this->getTo() .
                "','" .
                $this->getText() .
                "','" .
                $this->getUser() .
                "', callback, true, {}, {}
            );"
        );

        return $data;
    }
}
