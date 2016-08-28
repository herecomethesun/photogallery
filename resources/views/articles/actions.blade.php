<div class="btn-group">
    <button type="button"
            class="btn btn-default btn-xs dropdown-toggle"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
    >
        <i class="fa fa-cog"></i> <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="{{ route('article.edit', $article->id) }}">Редактировать</a></li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="#" onclick="event.preventDefault();if(confirm('Вы уверены что хотите удалить?'))document.getElementById('article-delete-form-{{ $article->id }}').submit();">
                <i class="fa fa-trash"></i> Удалить
            </a>
        </li>
    </ul>

    <form action="{{ route('article.destroy', $article->id) }}" method="post" id="article-delete-form-{{ $article->id }}" class="hidden">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>
</div>