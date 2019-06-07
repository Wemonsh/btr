@extends('layouts.game')

@section('header')
    <div class="profile-header">
        <div class="container">
            <h1 class="headline">{{ $game['name'] }}</h1>
            @foreach($game['gaming_services'] as $service)
                @if($service['alias'] == $serviceAlias)
                    <p class="description">{{ $service['alias'].' - '.$service['description'] }}</p>
                @endif
            @endforeach
        </div>
    </div>

    <style>
        .profile-header {
            padding-top: 75px;
            min-height: 700px;
            background: url('{{ $game['full_image'] }}') 100% 13% no-repeat, {{ $game['background'] }};
            background-position: top right, center;
        }
    </style>
@endsection

@section('content')
    <nav>
        <div class="nav nav-tabs">
            @foreach($game['gaming_services'] as $service)
                <a class="nav-item nav-link{{ $service['alias'] == $serviceAlias ? ' active' : null }}" href="/{{ $gameAlias }}/{{ $service['alias'] }}" >{{ $service['name'] }}</a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-10">
                    <form action="#" class="form-inline filter">

                        @forelse($selects['category'] as $select)
                            <div class="form-group">
                                <select class="form-control" name="{{ $select['name'] }}">
                                    <option selected disabled>{{ $select['placeholder'] }}</option>
                                    @foreach($select['select'] as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @empty
                            <p>Нет категорий поиска</p>
                        @endforelse

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Продавец в онлайне</label>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <a class="btn-main">Продать золото</a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-f" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row">
                <div class="col-10">
                    <form action="#" class="form-inline filter">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Сервер</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Сторона</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Тип услуги</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Продавец в онлайне</label>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <a class="btn-main">Продать аккаунт</a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-wrapper">
        <br>
        <div class="alert alert-info" role="alert">
            В данной категории активных сделок нет!
        </div>
        <br>

    </div>




    <style>

        .table-wrapper {
            margin-top: 10px;
            background-color: #ffffff;
        }

        .btn-main {
            display: block;
            text-align: center;
            margin: 0 auto;
            width: 100%;
            font-size: 18px;
            text-decoration: none;
            padding: 15px;
            background: linear-gradient(135deg, #0B7FFF, #01F6FD);
            border-radius: 30px;
            color: #ffffff !important;
            transition: 2s;
        }

        .btn-main:hover {
            cursor: pointer;
            box-shadow: 0px 20px 40px -20px #01F6FD;
        }

        .filter select {
            min-width: 220px;
            height: 60px;
            margin-right: 30px;
            border-radius: 29px;
            background: #f2f3f6;
            box-shadow: 0px 20px 40px- 20px #bec6de;
        }


        .profile-header .headline {
            color: #ffffff;
            font-size: 42px;
            font-weight: 400;
            line-height: 56px;
        }

        .profile-header .description {
            color: #ffffff;
            font-size: 18px;
            font-weight: 400;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .tab-content {
            padding: 30px 40px;
            border-radius: 0px 6px 6px 6px;
        }
        .nav-tabs > .nav-item {
            position: relative;
            border: none;
            padding: 20px 40px;
            color: #ffffff;
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;

        }

        .nav-tabs > .active:after {
            content: '';
            top: 0;
            left: 0;
            position: absolute;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #0B84FF, #02EDFD);
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        .tab-content {
            background-color: #ffffff;
        }
    </style>

@endsection