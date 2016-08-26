@if (Auth::check())
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('page.edit', $page->id) }}">
                    <i class="fa fa-pencil"></i> Редактировать
                </a>
            </li>
        </ul>
    </div>
@endif
