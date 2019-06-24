@extends('layouts.dashboard')

@section('content')
    <h1>Категории для игры "{{ $data->name }}"</h1>
    <hr>
    <a class="btn btn-primary mb-3" href="{{ route('gamesAdmin').'?game_id='.$game_id.'&action=create' }}">Добавить категорию</a>
    <a class="btn btn-primary mb-3" href="{{ route('gamesAdmin') }}">Назад</a>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">#</th>
                <th class="align-middle text-center" scope="col">Название услуги</th>
                <th class="align-middle text-center" scope="col">Alias</th>
                <th class="align-middle text-center" scope="col">Описание</th>
                <th class="align-middle text-center" scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data->categories as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$value->id }}" title="{{ $value->name }}">{{ $value->name }}</a>
                </td>
                <td class="align-middle text-center">{{ $value->alias }}</td>
                <td class="align-middle text-center">{{ $value->description }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?game_id='.$game_id.'&id='.$value->id.'&action=edit' }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?game_id='.$game_id.'&id='.$value->id.'&action=delete' }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
