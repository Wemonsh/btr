<?php

namespace App\Http\Controllers\Game;

use App\Content;
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
                $content = Content::where('id', '=', $request[$value['name']])->first();
                $arr = array('id' => $content['id'], 'name' => $content['name'], 'placeholder' => $value['placeholder'], 'select' => $value['name']);
                array_push($properties, $arr);
            }

            dump($category);

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

    public function edit(Request $request, $gameAlias, $categoryAlias, $id) {
        if (view()->exists('orders.edit')) {
           $order = Order::where('id', '=', $id)->where('seller_id', '=', Auth::user()->id)->first();
            dump($order);
        } else {
            abort(404);
        }
    }

    public function show (Request $request, $gameAlias, $categoryAlias, $id) {
        if (view()->exists('orders.show')) {
            if ($request->isMethod('post')) {

                return view('orders.show');
            } else {

                // Информация об игре
                $game = Game::with('categories')->where('alias', '=', $gameAlias)->first()->toArray();

                // Услуги конректной игры
                $category = Category::with(['selects' => function($query) {
                    $query->with('content');
                }])->where('game_id','=', $game['id'])
                    ->where('alias', '=', $categoryAlias)->first()->toArray();

                $vars = [
                    'game' => $game,
                    'gameAlias' => $gameAlias,
                    'serviceAlias' => $categoryAlias,
                    'order' => Order::with('game', 'service', 'seller', 'customer')->where('id', $id)->first(),
                ];


                return view('orders.show', $vars);
            }
        } else {
            abort(404);
        }
    }

    public function buy(Request $request, $gameAlias, $categoryAlias, $id) {
        echo $gameAlias;
        echo $categoryAlias;
        echo $id;

        $user = User::where('id', '=', Auth::user()->id)->first();

        $order = Order::where('id', '=', $id)->first();

        dump($user);
        dump($order);

        if ($user->balance >= (int)$order->cost) {
            $user->balance -= (int)$order->cost;
            $user->save();
            $order->customer_id = $user->id;
            $order->save();
        } else {
            echo 'недостаточно средств';
        }

    }

    private function getGameFullInfo ($game) {
        return Game::with('gamingServices')->where('alias', '=', $game)->first();
    }
}
