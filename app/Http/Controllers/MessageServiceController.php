<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageServiceController extends Controller
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function sendMessage(Request $request)
    {

        try {
            $result = $this->messageService->send($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return response()->json(['data' => $result]);
    }
}
