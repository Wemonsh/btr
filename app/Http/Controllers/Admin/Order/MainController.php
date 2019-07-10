<?php

namespace App\Http\Controllers\Admin\Order;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        if (view()->exists('admin.orders.index')) {
            $vars = [
                'orders' => Order::with('game', 'service', 'seller', 'customer')->paginate(20)
            ];
            return view('admin.orders.index', $vars);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        if (view()->exists('admin.orders.create')) {
            if ($request->isMethod('post'))
            {
                $files = $request->file('images');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/order_images', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $json = json_encode($array);
                }
                Order::create([
                    'description' => $request->input('description'),
                    'properties' => $request->input('properties'),
                    'images' => $json,
                    'game_id' => $request->input('game_id'),
                    'service_id' => $request->input('service_id'),
                    'seller_id' => $request->input('seller_id'),
                    'customer_id' => $request->input('customer_id'),
                    'paid' => $request->input('paid'),
                ]);
                return redirect('/admin/orders');
            } else {
                return view('admin.orders.create');
            }
        } else {
            abort(404);
        }
    }

    public function edit(Request $request, $id) {
        if (view()->exists('admin.orders.edit')) {
            if ($request->isMethod('post')) {
                $order = Order::with('game', 'service', 'seller', 'customer')->where('id','=', $id)->first();
                $files = $request->file('images');
                $json = null;
                if ($files != null) {
                    $array = [];
                    $counter = 0;
                    foreach ($files as $file) {
                        $array[$counter]['id'] = $counter;
                        $array[$counter]['path'] = $file->store('/order_images', 'public');
                        $array[$counter]['name'] = $file->getClientOriginalName();
                        $counter++;
                    }
                    $jsonDecode = json_decode($order->images);
                    if ($jsonDecode != null) {
                        foreach ($array as $file) {
                            array_push($jsonDecode, $file);
                        }
                        $json = json_encode($jsonDecode);
                    } else {
                        $json = json_encode($array);
                    }
                    $order->images = $json;
                }
                $order->description = $request->input('description');
                //$order->properties = $request->input('properties');
                //$order->game_id = $request->input('game_id');
                //$order->service_id = $request->input('service_id');
                //$order->seller_id = $request->input('seller_id');
                //$order->customer_id = $request->input('customer_id');
                $order->paid = $request->input('paid');
                $order->save();
                return redirect('/admin/orders');
            } else {
                $order = Order::with('game', 'service', 'seller', 'customer')->where('id','=', $id)->first();
                if ($order != null) {
                    $vars = [
                        'order' => $order,
                        'id' => $id,
                    ];
                    return view('admin.orders.edit', $vars);
                } else {
                    abort(404);
                }
            }
            return view('admin.orders.edit');
        } else {
            abort(404);
        }
    }

    public function delete($id) {
        if ($id != null) {
            Order::find($id)->delete();
        }
        return redirect('/admin/orders');
    }
}
