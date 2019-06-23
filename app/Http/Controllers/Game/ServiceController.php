<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index($gameAlias, $categoryAlias) {
        // Информация об игре
        $game = Game::with('categories')->where('alias', '=', $gameAlias)->first()->toArray();

        // Услуги конректной игры
        $category = Category::with(['selects' => function($query) {
            $query->with('content');
        }])->where('game_id','=', $game['id'])
            ->where('alias', '=', $categoryAlias)->first()->toArray();

        $vars = [
            'game' => $game,
            'category' => $category,
            'gameAlias' => $gameAlias,
            'serviceAlias' => $categoryAlias,
        ];


        $orders = Order::with('game', 'service', 'seller', 'customer')
            ->where('game_id','=', $game['id'])
            ->where('service_id', '=', $category['id'])
            ->where('paid', '!=', 1)
            ->where('customer_id', '=', null)
//            ->whereRaw('JSON_CONTAINS(properties->"$[*].name", \'"Aion server 2"\')')
            ->get();

        foreach ($orders as $order) {

            $properties = json_decode($order->properties);
            $order->properties = $properties;
        }

        $vars['orders'] = $orders->toArray();

        dump($vars);

        return view('games.template', $vars);
    }

    private function getGameFullInfo ($game) {
        return Game::with('gamingServices')->where('alias', '=', $game)->first();
    }
}
