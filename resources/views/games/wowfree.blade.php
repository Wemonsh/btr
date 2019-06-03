@extends('layouts.game')

@section('header')
    <div class="profile-header">
        <div class="container">
            <h1 class="headline">WOW FREE</h1>
            <p class="description">Здесь вы можете продать или купить аккаунт Aion.<br>Продавцы получают оплату только после полной проверки аккаунта.</p>
        </div>
    </div>

    <style>
        .profile-header {
            padding-top: 75px;
            min-height: 700px;
            background: url('/img/pages/wowfree.png') 100% 13% no-repeat, linear-gradient(235deg, #7B1A1A, #131B1D);
            background-position: top right, center;
        }
    </style>
@endsection

@section('content')
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Золото</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Аккаунты</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Предметы</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-f" role="tab" aria-controls="nav-contact" aria-selected="false">Услуги</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                <option selected>Расса</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Класс</option>
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
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                <option selected>Тип</option>
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