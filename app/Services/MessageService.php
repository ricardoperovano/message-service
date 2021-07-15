<?php

namespace App\Services;

use App\Factory\BrokerFactory;
use App\Factory\MessageFactory;

class MessageService
{

    private $brokerFactory;
    private $messageFactory;

    public function __construct(BrokerFactory $brokerFactory, MessageFactory $messageFactory)
    {
        $this->brokerFactory = $brokerFactory;
        $this->messageFactory = $messageFactory;
    }

    public function send(array $data = [])
    {
        $brokerType = $data['broker'];

        // Retorna o broker por onde a mensagem será enviada
        $broker = $this->brokerFactory->make($brokerType);

        // Inicializa o broker com as configurações necessárias
        $broker->initialize($data);

        $message = $this->messageFactory->make($data);

        $message->setBroker($broker);
        return $message->send();
    }
}
