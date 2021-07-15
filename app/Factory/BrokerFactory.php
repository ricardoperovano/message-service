<?php

namespace App\Factory;

use App\Models\WhatsAppBroker;
use App\Contracts\IBroker;

class BrokerFactory {
    
    public function make(string $type): IBroker {

        switch ($type) {
            case 'whatsapp':
                return new WhatsAppBroker();
                break;
            
            default:
            return new WhatsAppBroker();
                break;
        }

    }
}