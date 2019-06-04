<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\Service;
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

        dump($vars);

        return view('games.template', $vars);
    }

    private function getGameFullInfo ($game) {
        return Game::with('gamingServices')->where('alias', '=', $game)->first();;
    }
}
