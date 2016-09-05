@if (Auth::check())
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">

            <li>
                <a href="#addImageModal" data-toggle="modal" data-target="#addImageModal">
                    <i class="fa fa-plus"></i> Добавить изображение
                </a>
            </li>

            <li>
                <a href="{{ route('album.edit', $album->id) }}">
                    <i class="fa fa-pencil"></i> Редактировать
                </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="#" onclick="event.preventDefault(); if (confirm('Вы уверены?')) document.getElementById('delete-album-form').submit();">
                    <i class="fa fa-trash"></i> Удалить альбом
                </a>
            </li>
        </ul>
    </div>

    <form id="delete-album-form"
          method="post"
          action="{{ route('album.delete', $album->id) }}"
          class="hidden"
    >
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>

    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addImageModalLabel">Загрузка изображения</h4>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button id="image-upload-btn" type="button" class="btn btn-primary">Загрузить</button>
                </div>
            </div>
        </div>
    </div>
@endif