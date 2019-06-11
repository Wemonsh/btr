@extends('layouts.blank')

@section('content')
    <h1>Продажа аккаунта Aion</h1>
    <form class="form-create"
          action="{{ route('orderCreate', [$gameAlias, $serviceAlias]) }}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="row">
                @foreach($selects['category'] as $select)
                    <div class="form-group col-6">
                        <select class="form-control" name="{{ $select['name'] }}">
                            <option selected disabled>{{ $select['placeholder'] }}</option>
                            @foreach($select['select'] as $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach

                    <div class="form-group col-6">
                        <input name="cost" type="text" class="form-control" placeholder="Стоимость">
                    </div>

                </div>

                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Описание" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit">Подать объявление</button>
                </div>

            </div>
            <div class="col-4">
                <div id="upload-container" class="form-group">
                    <img id="upload-image" src="/img/Shape.png">
                    <div>
                        <input id="file-input" type="file" name="file" multiple>
                        <label for="file-input">Загрузить скриншот</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <style>

        h1 {
            padding: 40px 0px 20px;
            font-size: 48px;
            font-weight: 400;
            line-height: 64px;
        }

        .form-create textarea{
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            padding: 15px;
            border: none;
            border-radius: 29px;
            background: #ffffff;
            box-shadow: 0px 20px 40px -20px #bec6de;
        }

        .form-create button {
            border: none;
            max-width: 245px;
            display: block;
            text-align: center;
            width: 100%;
            font-size: 18px;
            text-decoration: none;
            padding: 15px;
            background: linear-gradient(135deg, #0B7FFF, #01F6FD);
            border-radius: 30px;
            color: #ffffff !important;
            transition: 2s;
            box-shadow: 0px 20px 40px -20px #bec6de;
        }

        .form-create button:hover {
            cursor: pointer;
            box-shadow: 0px 20px 40px -20px #01F6FD;
            text-decoration: none;
        }

        .form-create select {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            height: auto;
            padding: 15px;
            min-width: 220px;
            margin-right: 30px;
            border: none;
            border-radius: 29px;
            background: #ffffff;
            box-shadow: 0px 20px 40px -20px #bec6de;
        }

        .form-create input {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
            height: auto;
            padding: 15px;
            border: none;
            border-radius: 29px;
            background: #ffffff;
            box-shadow: 0px 20px 40px -20px #bec6de;
        }

        .form-create #upload-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: #ffffff;
            height: 270px;
            box-shadow: 0px 20px 40px -20px #bec6de;
            border-radius: 7px;
        }

        .form-create #upload-container img {
            width: 40%;
            margin-bottom: 20px;
            user-select: none;
        }

        .form-create #upload-container label {
            font-size: 18px;
            font-weight: 400;
            line-height: 24px;
        }

        .form-create #upload-container label:hover {
            cursor: pointer;
            text-decoration: underline;
        }

        .form-create #upload-container div {
            position: relative;
            z-index: 10;
        }

        .form-create #upload-container input[type=file] {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            position: absolute;
            z-index: -10;
        }

        .form-create #upload-container label.focus {
            outline: 1px solid #0078d7;
            outline: -webkit-focus-ring-color auto 5px;
        }

        .form-create #upload-container.dragover {
            background-color: #fafafa;
            outline-offset: -17px;
        }


    </style>


    <script>
        $(document).ready(function(){
            var dropZone = $('#upload-container');

            $('#file-input').focus(function() {
                $('label').addClass('focus');
            })
                .focusout(function() {
                    $('label').removeClass('focus');
                });


            dropZone.on('drag dragstart dragend dragover dragenter dragleave drop', function(){
                return false;
            });

            dropZone.on('dragover dragenter', function() {
                dropZone.addClass('dragover');
            });

            dropZone.on('dragleave', function(e) {
                var dx = e.pageX - dropZone.offset().left;
                var dy = e.pageY - dropZone.offset().top;
                if ((dx < 0) || (dx > dropZone.width()) || (dy < 0) || (dy > dropZone.height())) {
                    dropZone.removeClass('dragover');
                }
            });

            dropZone.on('drop', function(e) {
                dropZone.removeClass('dragover');
                var files = e.originalEvent.dataTransfer.files;
                sendFiles(files);
            });

            $('#file-input').change(function() {
                var files = this.files;
                sendFiles(files);
            });


            function sendFiles(files) {
                var maxFileSize = 5242880;
                var Data = new FormData();
                $(files).each(function(index, file) {
                    if ((file.size <= maxFileSize) && ((file.type == 'image/png') || (file.type == 'image/jpeg'))) {
                        Data.append('images[]', file);
                    }
                });

                $.ajax({
                    url: dropZone.attr('action'),
                    type: dropZone.attr('method'),
                    data: Data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert ('Файлы были успешно загружены!');
                    }
                });
            }
        })
    </script>

@endsection

