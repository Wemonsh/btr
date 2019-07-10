@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные категории игр</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные категории игр</h1>
    <hr>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Игра</th>
            <th class="align-middle text-center" scope="col">Название услуги</th>
            <th class="align-middle text-center" scope="col">Alias</th>
            <th class="align-middle text-center" scope="col">Описание</th>
            <th class="align-middle text-center" scope="col">Удален</th>
            @if(count($categories) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="align-middle text-center">{{ $category->id }}</td>
                <td class="align-middle text-center">{{ $category->game->name }}</td>
                <td class="align-middle text-center">{{ $category->name }}</td>
                <td class="align-middle text-center">{{ $category->alias }}</td>
                <td class="align-middle text-center">{{ $category->description }}</td>
                <td class="align-middle text-center">{{ $category->deleted_at }}</td>
                <td class="align-middle text-center">
                    @if(count($categories) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('gamesCategoriesRecover', $category->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $categories->render() }}
@endsection
