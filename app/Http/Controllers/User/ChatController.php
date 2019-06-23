<?php

namespace App\Http\Controllers\User;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request, $id = null) {

        $orders = Order::with('game', 'service', 'seller', 'customer')
            ->where('paid', '!=', 1)
            ->where('customer_id', '=', Auth::user()->id)
            ->get();

        $vars = [
            'id' => $id,
            'orders' => $orders
        ];

        dump($orders);

        return view('user/chat', $vars);
    }
}
