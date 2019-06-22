<?php

namespace App\Http\Controllers\Game;

use App\Game;
use App\Order;
use App\Category;
use App\ServiceCategoryContent;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request, $gameAlias, $categoryAlias) {
        if ($request->isMethod('get')) {
            // Информация об игре
            $game = Game::with('categories')->where('alias', '=', $gameAlias)->first()->toArray();

            // Услуги конректной игры
            $category = Category::with(['selects' => function($query) {
                $query->with('content');
            }])->where('game_id','=', $game['id'])
                ->where('alias', '=', $categoryAlias)->first()->toArray();

            $vars = [
                'gameAlias' => $gameAlias,
                'serviceAlias' => $categoryAlias,
                'game' => $game,
                'category' => $category
            ];

            dump($vars);

            return view('orders/create', $vars);
        } else {


            // Информация об игре
            $game = Game::with('categories')->where('alias', '=', $gameAlias)->first()->toArray();

            // Услуги конректной игры
            $category = Category::with(['selects' => function($query) {
                $query->with('content');
            }])->where('game_id','=', $game['id'])
                ->where('alias', '=', $categoryAlias)->first()->toArray();

            $properties = [];

            foreach ($category['selects'] as $value) {
                $content = Category::where('id', '=', $request[$value['name']])->first();
                $arr = array('id' => $content['id'], 'name' => $content['name'], 'placeholder' => $value['placeholder'], 'select' => $value['name']);
                array_push($properties, $arr);
            }

            $properties = json_encode($properties, false);


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
                    'images' => $json,
                    'game_id' => $game['id'],
                    'service_id' => $category['id'],
                    'seller_id' => Auth::user()->id,
                ]
            );

            return redirect(route('game', [$gameAlias, $categoryAlias]));
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

                $ser = Category::with('category')->where('alias', '=', $service)
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
