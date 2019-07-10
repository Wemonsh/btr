@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Слайдер</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Слайдер</h1>
    <hr>
    <a class="btn btn-primary mb-3" href="{{ route('sliderCreate') }}">Добавить новый слайдер</a>
    <table class="table table-bordered table-sm">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Изображение</th>
            <th class="align-middle text-center" scope="col">Заголовок</th>
            <th class="align-middle text-center" scope="col">Описание</th>
            <th class="align-middle text-center" scope="col">Текст кнопки</th>
            <th class="align-middle text-center" scope="col">Ссылка</th>
            <th class="align-middle text-center" scope="col">Кнопка активна?</th>
            <th class="align-middle text-center" scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">{{ $value->image }}</td>
                <td class="align-middle text-center">{{ $value->headline }}</td>
                <td class="align-middle text-center">{{ $value->description }}</td>
                <td class="align-middle text-center">{{ $value->button_text }}</td>
                <td class="align-middle text-center">{{ $value->link }}</td>
                <td class="align-middle text-center">{{ $value->button_exists }}</td>
                <td class="align-middle text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-secondary btn-sm text-light" href="{{ route('sliderEdit', $value->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                        <a class="btn btn-secondary btn-sm text-light" href="{{ route('sliderDelete', $value->id) }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection