@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные селекты</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные селекты</h1>
    <hr>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Имя</th>
            <th class="align-middle text-center" scope="col">Placeholder</th>
            <th class="align-middle text-center" scope="col">Категории</th>
            <th class="align-middle text-center" scope="col">Контент</th>
            <th class="align-middle text-center" scope="col">Удален</th>
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
                <td class="align-middle text-center">{{ $select->placeholder }}</td>
                <td class="align-middle text-center">
                    @foreach($select->categories as $category)
                        @if($category->name == 'admin')
                            <span class="badge badge-success">{{ $category->name }}</span>
                        @else
                            <span class="badge badge-secondary">{{ $category->name }}</span>
                        @endif
                    @endforeach
                </td>
                <td class="align-middle text-center">
                    @foreach($select->content as $content)
                        @if($content->name == 'admin')
                            <span class="badge badge-success">{{ $content->name }}</span>
                        @else
                            <span class="badge badge-secondary">{{ $content->name }}</span>
                        @endif
                    @endforeach
                </td>
                <td class="align-middle text-center">{{ $select->deleted_at }}</td>
                <td class="align-middle text-center">
                    @if(count($selects) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('selectsRecover', $select->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $selects->render() }}
@endsection
