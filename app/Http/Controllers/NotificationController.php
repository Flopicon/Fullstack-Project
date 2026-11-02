<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeStudent;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendTelegramMessage;

class NotificationController extends Controller
{
    public function __construct(
        protected TelegramService $telegramService
    ) {}
    //
    public function sendMail(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');

        // Mail::to($email)->queue(new WelcomeStudent($name));
        // $this->telegramService->send('hi newyork');

// SendTelegramMessage::dispatch($name)
SendTelegramMessage::dispatch('Justin')
    ->onQueue('telegram');
        // Mail::to($email)->send(new WelcomeStudent($name));
        return response()->json([
            "message" => "Mail Sent!"
        ]);
    }
}

