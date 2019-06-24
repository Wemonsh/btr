@extends('layouts.dashboard')

@section('content')
    <h1>Селекты для категории "{{ $data->name }}" и игры "{{ $data->game->name }}"</h1>
    <hr>
    <a class="btn btn-primary mb-3" href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$category_id.'&action=create' }}">Добавить селект</a>
    <a class="btn btn-primary mb-3" href="{{ route('gamesAdmin').'?game_id='.$game_id}}">Назад</a>
    <table class="table table-bordered table-sm mt-3">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">#</th>
                <th class="align-middle text-center" scope="col">Название</th>
                <th class="align-middle text-center" scope="col">Категория</th>
                <th class="align-middle text-center" scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data->selects as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$category_id.'&select_id='.$value->id }}" title="{{ $value->name }}">{{ $value->name }}</a>
                </td>
                <td class="align-middle text-center">{{ $value->placeholder }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?game_id='.$game_id.'&category_id='.$category_id.'&id='.$value->id.'&action=edit' }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?game_id='.$game_id.'&category_id='.$category_id.'&id='.$value->id.'&action=delete' }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
