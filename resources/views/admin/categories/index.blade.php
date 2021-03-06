@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категории</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Категории</h1>
    <hr>
    <div>
        <a class="btn btn-secondary text-light" href="{{ route('categoriesCreate') }}">Добавить категорию</a>
    </div>
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
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('categoriesDelete', $category->id) }}" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories->render() }}

    <hr>
    <a href="{{ route('categoriesDeleted') }}" title="Отобразить удаленные категории">Отобразить удаленные категории</a>
@endsection