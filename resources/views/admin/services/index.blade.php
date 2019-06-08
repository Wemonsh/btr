@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Услуги</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Услуги</h1>
    <hr>
    <div>
        <a class="btn btn-secondary text-light" href="{{ route('servicesCreate') }}">Добавить услугу</a>
    </div>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Название</th>
            <th class="align-middle text-center" scope="col">Alias</th>
            <th class="align-middle text-center" scope="col">Описание</th>
            <th class="align-middle text-center" scope="col">Игра</th>
            @if(count($services) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td class="align-middle text-center">{{ $service->id }}</td>
                <td class="align-middle text-center">{{ $service->name }}</td>
                <td class="align-middle text-center">{{ $service->alias }}</td>
                <td class="align-middle text-center">{{ $service->description }}</td>
                <td class="align-middle text-center">{{ $service->game->name }}</td>
                <td class="align-middle text-center">
                    @if(count($services) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('servicesEdit', $service->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                            <a class="btn btn-secondary btn-sm text-light" href="#" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $services->render() }}
@endsection