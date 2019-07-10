@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные элементы слайдера</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные элементы слайдера</h1>
    <hr>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Изображение</th>
            <th class="align-middle text-center" scope="col">Заголовок</th>
            <th class="align-middle text-center" scope="col">Описание</th>
            <th class="align-middle text-center" scope="col">Текст кнопки</th>
            <th class="align-middle text-center" scope="col">Ссылка</th>
            <th class="align-middle text-center" scope="col">Кнопка активна?</th>
            <th class="align-middle text-center" scope="col">Удален</th>
            @if(count($slider) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($slider as $value)
            <tr>
                <td class="align-middle text-center">{{ $value->id }}</td>
                <td class="align-middle text-center">{{ $value->image }}</td>
                <td class="align-middle text-center">{{ $value->headline }}</td>
                <td class="align-middle text-center">{{ $value->description }}</td>
                <td class="align-middle text-center">{{ $value->button_text }}</td>
                <td class="align-middle text-center">{{ $value->link }}</td>
                <td class="align-middle text-center">{{ $value->button_exists }}</td>
                <td class="align-middle text-center">{{ $value->deleted_at }}</td>
                <td class="align-middle text-center">
                    @if(count($slider) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('sliderRecover', $value->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $slider->render() }}
@endsection
