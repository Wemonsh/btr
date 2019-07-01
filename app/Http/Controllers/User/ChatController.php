<?php

namespace App\Http\Controllers\User;

use App\Events\MessageSend;
use App\Message;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null) {

        $orders = Order::with('game', 'service', 'seller', 'customer')
            ->where('paid', '!=', 1)
            ->where('customer_id', '=', Auth::user()->id)
            ->get();

        $vars = [
            'id' => $id,
            'orders' => $orders
        ];


        return view('user/chat', $vars);
    }

    public function fetchMessages(Request $request) {
        return Message::with('user')->where('order_id', '=', $request['order'])->get();
    }

    public function sendMessage(Request $request) {
        $message = auth()->user()->messages()->create(
            [
                'order_id' => $request['order'],
                'message' => $request->message
            ]
        );

        broadcast(new MessageSend($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
}
