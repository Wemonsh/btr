<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\Order;
use App\Service;
use App\ServiceCategoryContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index($game, $service) {

        $vars = [
            'game' => $this->getGameFullInfo($game)->toArray(),
            'gameAlias' => $game,
            'serviceAlias' => $service,
        ];

        $ser = Service::with('category')->where('alias', '=', $service)
            ->where('game_id', '=', $vars['game']['id'])->first()->toArray();

        foreach ($ser['category'] as $key => $category) {
            $category_id = $category['pivot']['category_id'];
            $ser['category'][$key]['select'] = ServiceCategoryContent::where('category_id', '=', $category_id)->get()->toArray();
        }


//        dump($vars);


        $vars['selects'] = $ser;


        $orders = Order::with('game', 'service', 'seller', 'customer')
            ->where('game_id','=', $vars['game']['id'])
            ->where('service_id', '=', $vars['selects']['id'])
            ->where('paid', '!=', 1)
//            ->whereRaw('JSON_CONTAINS(properties->"$[*].name", \'"Aion server 2"\')')
            ->get();

        foreach ($orders as $order) {

            $properties = json_decode($order->properties);
            $order->properties = $properties;
        }

        $vars['orders'] = $orders->toArray();

        //dump($vars['orders']);

        return view('games.template', $vars);
    }

    private function getGameFullInfo ($game) {
        return Game::with('gamingServices')->where('alias', '=', $game)->first();
    }
}
