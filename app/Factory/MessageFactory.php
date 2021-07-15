<?php

namespace App\Factory;

use App\Models\Message;
use App\Models\WhatsAppTextMessage;

class MessageFactory
{

    public function make(array $data): Message
    {
        $messageType = $data['type'];

        switch ($messageType) {
            case 'text':
                return new WhatsAppTextMessage($data);
                break;

            default:
                return new WhatsAppTextMessage($data);
                break;
        }
    }
}
