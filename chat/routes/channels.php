<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat-message.{userId}', function ($user, $userId) {
    Log::info('Channel authorized!');
    Log::info('User ID: ' . $user->id);
    Log::info('Channel User ID: ' . $userId);

    return (int) $user->id === (int) $userId;
});
