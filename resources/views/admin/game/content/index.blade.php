@extends('layouts.dashboard')

@section('content')
    <h1>Контент для селекта "{{ $select->name }}" категории "{{ $category->name }}" игры "{{ $game->name }}"</h1>
    <hr>
    <a class="btn btn-primary mb-3"  href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$category_id.'&select_id='.$select_id.'&action=create' }}">Добавить контент</a>
    <a class="btn btn-primary mb-3"  href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$category_id }}">Назад</a>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Название</th>
            <th class="align-middle text-center" scope="col">Селект</th>
            <th class="align-middle text-center" scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select->content as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">{{ $value->name }}</td>
                <td class="align-middle text-center">{{ $value->select->name }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?game_id='.$game_id.'&category_id='.$category_id.'&select_id='.$select->id.'&id='.$value->id.'&action=edit' }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?game_id='.$game_id.'&category_id='.$category_id.'&select_id='.$select->id.'&id='.$value->id.'&action=delete' }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
