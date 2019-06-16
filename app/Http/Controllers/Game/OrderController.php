<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\Order;
use App\Service;
use App\ServiceCategoryContent;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request, $game, $service) {
        if ($request->isMethod('get')) {
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

            $vars['selects'] = $ser;
            return view('orders/create', $vars);
        } else {

            $vars = [
                'game' => $this->getGameFullInfo($game)->toArray(),
                'gameAlias' => $game,
                'serviceAlias' => $service,
            ];

            $ser = Service::with('category')->where('alias', '=', $service)
                ->where('game_id', '=', $vars['game']['id'])->first()->toArray();


            $properties = [];

            foreach ($ser['category'] as $value) {
                $content = ServiceCategoryContent::where('id', '=', $request[$value['name']])->first();
                $arr = array('id' => $content['id'], 'name' => $content['name'], 'placeholder' => $value['placeholder'], 'select' => $value['name']);
                array_push($properties, $arr);
            }

            $properties = json_encode($properties, false);

            $vars['service'] = $ser;

            $images = $request->file('file');
            $json = null;
            if ($images != null) {
                $array = [];
                $counter = 0;
                foreach ($images as $file) {
                    $array[$counter]['id'] = $counter;
                    $array[$counter]['path'] = $file->store('/screenshots', 'public');
                    $array[$counter]['name'] = $file->getClientOriginalName();
                    $counter++;
                }
                $json = json_encode($array);
            }

            Order::create(
                [
                    'description' => $request['description'],
                    'properties' => $properties,
                    'cost' => $request['cost'],
                    'game_id' => $vars['game']['id'],
                    'service_id' => $vars['service']['id'],
                    'seller_id' => Auth::user()->id,
                ]
            );

            return redirect(route('game', [$game, $service]));
        }
    }

    public function show (Request $request, $game, $service, $id) {
        if (view()->exists('orders.show')) {
            if ($request->isMethod('post')) {

                return view('orders.show');
            } else {
                $vars = [
                    'game' => $this->getGameFullInfo($game)->toArray(),
                    'gameAlias' => $game,
                    'serviceAlias' => $service,
                    'order' => Order::with('game', 'service', 'seller', 'customer')->where('id', $id)->first(),
                ];

                $ser = Service::with('category')->where('alias', '=', $service)
                    ->where('game_id', '=', $vars['game']['id'])->first()->toArray();

                foreach ($ser['category'] as $key => $category) {
                    $category_id = $category['pivot']['category_id'];
                    $ser['category'][$key]['select'] = ServiceCategoryContent::where('category_id', '=', $category_id)->get()->toArray();
                }

                $vars['selects'] = $ser;

                return view('orders.show', $vars);
            }
        } else {
            abort(404);
        }
    }

    private function getGameFullInfo ($game) {
        return Game::with('gamingServices')->where('alias', '=', $game)->first();
    }
}
