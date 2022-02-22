<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class chatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        $data = [
            'authUser' => auth()->user(),
            'messages' =>Message::with('user')->get()
        ];
        return $data;
    }

    public function sendMessage()
    {
        $user = User::find(Auth::id());
        $message = $user->messages()->create([
            'message' => request()->input('message'),
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();
        return ['status' => 'message sent'];
    }
}
