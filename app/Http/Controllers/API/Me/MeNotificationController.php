<?php

namespace App\Http\Controllers\API\Me;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * All notification
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $request->user()->notifications;
    }

    /**
     * Mark read
     *
     * @param Notification $notification
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(Notification $notification)
    {
        $update = $notification->update(['read_at' => now()]);

        if ($update) {
            return response()->json(null, 204);
        }
    }

    /**
     * Mark unread
     *
     * @param Notification $notification
     * @return \Illuminate\Http\JsonResponse
     */
    public function unread(Notification $notification)
    {
        $update = $notification->update(['read_at' => null]);

        if ($update) {
            return response()->json(null, 204);
        }
    }

    /**
     * Mark all read
     *
     * @param Request $request
     */
    public function markAllRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
    }
}
