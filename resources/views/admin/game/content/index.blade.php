@extends('layouts.dashboard')

@section('content')
    <a href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$category_id.'&select_id='.$select_id.'&action=create' }}">Добавить</a>
    <a href="{{ route('gamesAdmin').'?game_id='.$game_id.'&category_id='.$category_id }}">Назад</a>
    <table>
        <tbody>
        @foreach($data->content as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">{{ $value->name }}</td>
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
