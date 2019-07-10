<?php

namespace App\Http\Controllers\Admin\Trashed;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index() {
        if (view()->exists('admin.trashed.orders.index')) {
            $vars = [
                'orders' => Order::onlyTrashed()->paginate(20)
            ];
            return view('admin.trashed.orders.index', $vars);
        } else {
            abort(404);
        }
    }

    public function recover($id) {
        if ($id != null) {
            Order::onlyTrashed()->find($id)->restore();
        }
        return redirect('/admin/trashed/orders');
    }
}
