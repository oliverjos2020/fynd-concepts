<?php

namespace App\Http\Controllers;

use App\Models\SendPushNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
       $notifications = SendPushNotification::all();
        return response()->json([
                'responseCode' => 200,
                'responseMessage' => 'success',
                'data' => $notifications
            ], 200);
    }
}