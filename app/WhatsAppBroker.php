<?php

namespace App\Models;

use App\Channel;
use App\Contracts\IBroker;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Facades\Log;

class WhatsAppBroker implements IBroker
{
    private $server;

    public function initialize(array $data): IBroker
    {
        $channelId  = $data['channel_id'];

        $channel = new Channel();
        $account = $channel->findWhatsappChannelById($channelId);

        if ($account) {
            $sessionId = $account->session_id;
            $serverHost = $account->host_name;
            $serverPort = $account->external_port;

            try {
                $this->server = RemoteWebDriver::createBySessionID(
                    $sessionId,
                    "http://$serverHost:$serverPort/wd/hub"
                );
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        return $this;
    }

    public function getServer()
    {
        return $this->server;
    }
}
