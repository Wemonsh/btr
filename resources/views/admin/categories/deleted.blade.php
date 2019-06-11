@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categoriesIndex') }}">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные категории</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные категории</h1>
    <hr>
    {{--    <div>--}}
    {{--        <a class="btn btn-secondary text-light" href="{{ route('gamesCreate') }}">Добавить игру</a>--}}
    {{--    </div>--}}
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Название</th>
            <th class="align-middle text-center" scope="col">Placeholder</th>
            @if(count($categories) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="align-middle text-center">{{ $category->id }}</td>
                <td class="align-middle text-center">{{ $category->name }}</td>
                <td class="align-middle text-center">{{ $category->placeholder }}</td>
                <td class="align-middle text-center">
                    @if(count($categories) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('categoriesEdit', $category->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('categoriesRecover', $category->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories->render() }}

    <hr>
    <a href="{{ route('categoriesIndex') }}" title="Отобразить список активных категорий">Отобразить список активных категорий</a>
@endsection

