@extends('layouts.dashboard')

@section('content')
    <a href="{{ route('gamesAdmin').'?game_id='.$game_id.'&action=create' }}">Добавить</a>
    <a href="{{ route('gamesAdmin') }}">Назад</a>
    <table>
        <tbody>
        @foreach($data->categories as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$value->id }}" title="{{ $value->name }}">{{ $value->name }}</a>
                </td>
                <td class="align-middle text-center">{{ $value->description }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="#" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="#" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
