@extends('layouts.dashboard')

@section('content')
    <a class="btn btn-primary mb-3" href="{{ request()->url().'?action=create' }}">Добавить</a>

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">#</th>
                <th class="align-middle text-center" scope="col">Название</th>
                <th class="align-middle text-center" scope="col">Alias</th>
                <th class="align-middle text-center" scope="col">Card Image</th>
                <th class="align-middle text-center" scope="col">Full Image</th>
                <th class="align-middle text-center" scope="col">Background</th>
                <th class="align-middle text-center" scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('gamesAdmin').'?game_id='.$value->id }}" title="{{ $value->name }}">{{ $value->name }}</a>
                </td>
                <td class="align-middle text-center">{{ $value->alias }}</td>
                <td class="align-middle text-center">{{ $value->card_image }}</td>
                <td class="align-middle text-center">{{ $value->full_image }}</td>
                <td class="align-middle text-center">{{ $value->background }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?id='.$value->id.'&action=edit' }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="{{ request()->url().'?id='.$value->id.'&action=delete' }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $data->render() }}
@endsection