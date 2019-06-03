@extends('layouts.additional')

@section('header')
    <h1 class="headline">{{ $user->name }}</h1>
    <ul class="head-buttons">
        <li class="button-item active-item"><a href="#">Аккаунты</a></li>
        <li class="button-item"><a href="#">Предметы</a></li>
        <li class="button-item"><a href="#">Заказы</a></li>
    </ul>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Последние заказы</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Мои кошельки</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Управление профилем</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
