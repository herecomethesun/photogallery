@if (Auth::check())
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
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
@endif