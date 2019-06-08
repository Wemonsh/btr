@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Селекты</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Селекты</h1>
    <hr>
    <div>
        <a class="btn btn-secondary text-light" href="{{ route('selectsCreate') }}">Добавить селект</a>
    </div>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Название</th>
            <th class="align-middle text-center" scope="col">Категория</th>
            @if(count($selects) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($selects as $select)
            <tr>
                <td class="align-middle text-center">{{ $select->id }}</td>
                <td class="align-middle text-center">{{ $select->name }}</td>
                <td class="align-middle text-center">{{ $select->gamingServices->name }}</td>
                <td class="align-middle text-center">
                    @if(count($selects) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('selectsEdit', $select->id) }}" title="Редактировать">Редактировать<i class="fas fa-pen"></i></a>
                            <a class="btn btn-secondary btn-sm text-light" href="#" title="Удалить">Удалить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $selects->render() }}
@endsection