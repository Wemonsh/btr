@extends('layouts.dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Удаленные пользователи</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Удаленные пользователи</h1>
    <hr>
    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Имя</th>
            <th class="align-middle text-center" scope="col">Email</th>
            <th class="align-middle text-center" scope="col">Баланс</th>
            <th class="align-middle text-center" scope="col">Роли</th>
            <th class="align-middle text-center" scope="col">Удален</th>
            @if(count($users) != 0)
                <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="align-middle text-center">{{ $user->id }}</td>
                <td class="align-middle text-center">{{ $user->name }}</td>
                <td class="align-middle text-center">{{ $user->email }}</td>
                <td class="align-middle text-center">{{ $user->balance }}</td>
                <td class="align-middle text-center">
                    @foreach($user->roles as $role)
                        @if($role->name == 'admin')
                            <span class="badge badge-success">{{ $role->name }}</span>
                        @else
                            <span class="badge badge-secondary">{{ $role->name }}</span>
                        @endif
                    @endforeach
                </td>
                <td class="align-middle text-center">{{ $user->deleted_at }}</td>
                <td class="align-middle text-center">
                    @if(count($users) != 0)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-sm text-light" href="{{ route('usersRecover', $user->id) }}" title="Восстановить">Восстановить<i class="fas fa-trash-alt"></i></a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->render() }}
@endsection
