<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Channel
{
    public function findWhatsappChannelById(int $id)
    {
        return DB::table('social_accounts')
            ->join('servers', 'servers.id', '=', 'social_accounts.server_id')
            ->select('social_accounts.session_id', 'servers.host_name', 'servers.external_port')
            ->where('social_accounts.id', '=', $id)->first();
    }
}
