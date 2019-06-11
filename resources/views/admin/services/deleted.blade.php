@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('servicesIndex') }}">Услуги</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные услуги</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные услуги</h1>
    <hr>
    {{--    <div>--}}
    {{--        <a class="btn btn-secondary text-light" href="{{ route('gamesCreate') }}">Добавить игру</a>--}}
    {{--    </div>--}}
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Игра</th>
            <th class="align-middle text-center" scope="col">Название услуги</th>
            <th class="align-middle text-center" scope="col">Alias</th>
            <th class="align-middle text-center" scope="col">Описание</th>
            @if(count($services) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td class="align-middle text-center">{{ $service->id }}</td>
                <td class="align-middle text-center">{{ $service->game->name }}</td>
                <td class="align-middle text-center">{{ $service->name }}</td>
                <td class="align-middle text-center">{{ $service->alias }}</td>
                <td class="align-middle text-center">{{ $service->description }}</td>
                <td class="align-middle text-center">
                    @if(count($services) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('servicesEdit', $service->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('servicesRecover', $service->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $services->render() }}

    <hr>
    <a href="{{ route('servicesIndex') }}" title="Отобразить список активных услуг">Отобразить список активных услуг</a>
@endsection
