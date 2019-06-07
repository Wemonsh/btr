<?php

namespace App\Http\Controllers\Game;

use App\Game;
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
//        dump($ser);

        $vars['selects'] = $ser;

        return view('games.template', $vars);
    }

    private function getGameFullInfo ($game) {
        return Game::with('gamingServices')->where('alias', '=', $game)->first();
    }
}
