@if (Auth::check())
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('album.create') }}?collection={{ $collection->id }}">
                    <i class="fa fa-object-group"></i> Добавить альбом
                </a>
            </li>
            <li>
                <a href="{{ route('collection.edit', $collection->id) }}">
                    <i class="fa fa-pencil"></i> Редактировать коллекцию
                </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="#" onclick="event.preventDefault(); if (confirm('Вы уверены?')) document.getElementById('delete-collection-form').submit();">
                    <i class="fa fa-trash"></i> Удалить коллекцию
                </a>
            </li>
        </ul>
    </div>

    <form id="delete-collection-form"
          method="post"
          action="{{ route('collection.delete', $collection->id) }}"
          class="hidden"
    >
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>
@endif