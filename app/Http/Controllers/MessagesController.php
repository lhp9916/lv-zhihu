<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    protected $message;

    /**
     * MessagesController constructor.
     * @param $message
     */
    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }

    public function store()
    {
        $message = $this->message->create([
            'to_user_id' => request('user'),
            'from_user_id' => user('api')->id,
            'body' => request('body'),
        ]);
        if ($message) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
