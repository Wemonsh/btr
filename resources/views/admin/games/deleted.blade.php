@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('gamesIndex') }}">Игры</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные игры</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные игры</h1>
    <hr>
{{--    <div>--}}
{{--        <a class="btn btn-secondary text-light" href="{{ route('gamesCreate') }}">Добавить игру</a>--}}
{{--    </div>--}}
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Название</th>
            <th class="align-middle text-center" scope="col">Alias</th>
            <th class="align-middle text-center" scope="col">Card Image</th>
            <th class="align-middle text-center" scope="col">Full Image</th>
            <th class="align-middle text-center" scope="col">Background</th>
            @if(count($games) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td class="align-middle text-center">{{ $game->id }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('gamesShow', $game->id) }}" title="{{ $game->name }}">{{ $game->name }}</a>
                </td>
                <td class="align-middle text-center">{{ $game->alias }}</td>
                <td class="align-middle text-center">{{ $game->card_image }}</td>
                <td class="align-middle text-center">{{ $game->full_image }}</td>
                <td class="align-middle text-center">{{ $game->background }}</td>
                <td class="align-middle text-center">
                    @if(count($games) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('gamesEdit', $game->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('gamesRecover', $game->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $games->render() }}

    <hr>
    <a href="{{ route('gamesIndex') }}" title="Отобразить список активных игр">Отобразить список активных игр</a>
@endsection
