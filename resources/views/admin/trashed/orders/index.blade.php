@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Закрытые заказы</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Закрытые заказы</h1>
    <hr>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Описание</th>
            <th class="align-middle text-center" scope="col">Свойства</th>
            <th class="align-middle text-center" scope="col">Стоимость</th>
            <th class="align-middle text-center" scope="col">Изображения</th>
            <th class="align-middle text-center" scope="col">Игра</th>
            <th class="align-middle text-center" scope="col">Категория</th>
            <th class="align-middle text-center" scope="col">Продавец</th>
            <th class="align-middle text-center" scope="col">Покупатель</th>
            <th class="align-middle text-center" scope="col">Оплачено?</th>
            <th class="align-middle text-center" scope="col">Дата создания</th>
            @if(count($orders) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="align-middle text-center">{{ $order->id }}</td>
                <td class="align-middle text-center">{{ $order->description }}</td>
                <td class="align-middle text-center">{{ $order->properties }}</td>
                <td class="align-middle text-center">{{ $order->cost }}</td>
                <td class="align-middle text-center">
                    @foreach(json_decode($order->images) as $file)
                        <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
                    @endforeach
                </td>
                <td class="align-middle text-center">{{ $order->game->name }}</td>
                <td class="align-middle text-center">{{ $order->service->name }}</td>
                <td class="align-middle text-center">{{ $order->seller->name }}</td>
                <td class="align-middle text-center">
                    @if($order->customer != null)
                        {{ $order->customer->name }}
                    @else
                        -
                    @endif
                </td>
                <td class="align-middle text-center">{{ $order->paid }}</td>
                <td class="align-middle text-center">{{ $order->created_at }}</td>
                <td class="align-middle text-center">
                    @if(count($orders) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('ordersRecover', $order->id) }}" title="Открыть заказ">Открыть<i class="fas fa-pen"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->render() }}
@endsection