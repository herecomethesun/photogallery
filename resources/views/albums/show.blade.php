@extends('layouts.app')

@section('title')
&laquo;{{ $album->title }}&raquo; из коллекции &laquo;{{ $album->collection->title }}&raquo; - {{ config('app.name') }}
@endsection

@section('content')

    <h1 class="page-header">Альбом: {{ $album->title }}</h1>

    @include('albums.actions')

    <div class="row">
        <div class="col-md-5">
            <p>
                <strong>Название коллекции:</strong>
                <a href="{{ route('collection.show', $album->collection->id) }}">
                    {{ $album->collection->title }}
                </a>
            </p>
            <p>
                <strong>Описание альбома:</strong><br>
                {!! $album->description !!}
            </p>

            <p>
                <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal">
                    <i class="fa fa-cart"></i> Оставить заявку
                </a>
            </p>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Изображения альбома</div>
                <div class="panel-body">
                    @if ($album->images->count())
                        <div class="row">
                            @foreach($album->images as $image)
                                <div class="col-xs-6 col-md-3">
                                    <a href="{{ asset($image->path) }}" class="thumbnail">
                                        <img src="{{ asset($image->thumbnail_path) }}" alt=""/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('albums.modal')
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script>
        (function() {
            var $imagePickerInput = $('#image-picker'),
                    $btnPickImageBtn = $('#btn-pick-image');


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
                            alert('Изображение загружено');
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
