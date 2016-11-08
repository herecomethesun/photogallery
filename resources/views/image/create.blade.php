@extends('layouts.app')

@section('title', "Редактирование альбома - " . config('app.name'))

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Добавление изображения в альбом &laquo;{{ $album->title }}&raquo;</h3>
        </div>

        <div class="panel-body">
            <div class="well well-sm">
                <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}">
                    <i class="fa fa-arrow-left"></i> Вернуться к альбому
                </a>
            </div>

            <div id="pages" class="pages">
                <div id="picker-page" class="image-picker-page page">
                    <div class="alert alert-info">
                        <ol>
                            <li>Выберите изображение с компьютера, нажав на кнопку <em>"Выбрать изображение"</em></li>
                            <li>Выберите область изображения для обрезки</li>
                            <li>Нажмите кнопку <em>"Загрузить"</em>, чтобы загрузить изображение в альбом.</li>
                        </ol>
                    </div>

                    <input type="file" name="image-picker" id="image-picker" class="hidden"/>

                    <div class="text-center">
                        <button id="btn-pick-image" class="btn btn-primary btn-lg">Выбрать изображение</button>
                    </div>
                </div>

                <div id="cropper-page" class="cropper-page page">
                    <img src="" id="crop-canvas" class="img-responsive">
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <button id="image-upload-btn" type="button" class="btn btn-primary btn-lg">
                <i class="fa fa-upload"></i>
                Загрузить
            </button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            var $imagePickerInput = $('#image-picker'),
                $btnPickImageBtn = $('#btn-pick-image');

            var albumPageUrl = "{{ route('album.show', [$album->collection->id, $album->id]) }}";

            var $canvas = $('#crop-canvas');

            var files = [];

            var $imageUploadBtn = $('#image-upload-btn');

            $('#pages').find('.page').hide();
            $imageUploadBtn.prop('disabled', true);

            var showPickerPage = function() {
                $('#picker-page').show();
                $("#cropper-page").hide();
            };

            var showCropperPage = function() {
                $('#picker-page').hide();
                $("#cropper-page").show();
            };

            var resetCropper = function() {
                files = [];
                $canvas.cropper('destroy');
                showPickerPage();
            };

            showPickerPage();

            $btnPickImageBtn.on('click', function () {
                $imagePickerInput.trigger('click');
            });

            $imagePickerInput.on('change', function (event) {
                files = event.target.files;

                if (files.length) {
                    var file = files[0];

                    showCropperPage();

                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $canvas.attr('src', event.target.result);

                        $canvas.cropper({
                                    aspectRatio: {{ config('images.album_thumbnail_size.width') }} / {{ config('images.album_thumbnail_size.height') }}
                    });

                        $imageUploadBtn.prop('disabled', false);
                    };

                    reader.readAsDataURL(file);
                }
            });

            $imageUploadBtn.on('click', function() {

                $imageUploadBtn.button('loading');

                $canvas.cropper('getCroppedCanvas').toBlob(function(blob) {

                    var formData = new FormData();
                    formData.append('photo', files[0]);
                    formData.append('thumbnail', blob);

                    $.ajax('/album/{{ $album->id }}/upload', {
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status === 'success') {
                                if (! confirm('Изображение загружено. Загрузить ещё одно?')) {
                                    window.location.href = albumPageUrl;
                                }
                            }
                        },
                        error: function () {
                            alert('Возникла ошибка при загрузке изображения на сервер. Повторите попытку.');
                        }
                    })
                            .always(function() {
                                $imageUploadBtn.button('reset');
                                resetCropper();
                            });
                });
            });
        })();
    </script>
@endsection
