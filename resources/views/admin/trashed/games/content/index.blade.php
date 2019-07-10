@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленный контент</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленный контент</h1>
    <hr>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Имя</th>
            <th class="align-middle text-center" scope="col">Селект</th>
            <th class="align-middle text-center" scope="col">Удален</th>
            @if(count($content) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($content as $item)
            <tr>
                <td class="align-middle text-center">{{ $item->id }}</td>
                <td class="align-middle text-center">{{ $item->name }}</td>
                <td class="align-middle text-center">{{ $item->select->name }}</td>
                <td class="align-middle text-center">{{ $item->deleted_at }}</td>
                <td class="align-middle text-center">
                    @if(count($content) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('contentRecover', $item->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $content->render() }}
@endsection

