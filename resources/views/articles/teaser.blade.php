<div class="panel">
    <div class="panel-heading">
        <h2 class="panel-title">
            {!! $article->published ? '' : '<label class="label label-info">Черновик</label>' !!}
            <a href="{{ route('article.show', $article->id) }}">
                {{ $article->title }}
            </a>


            <span class="pull-right">
                @include('articles.actions')
            </span>
        </h2>
    </div>

    <div class="panel-body">
        {!! str_limit($article->content, 200) !!} <br>

        <a href="{{ route('article.show', $article->id) }}">
            Подробнее...
        </a>
    </div>
    {{--<div class="panel-footer">--}}
        {{--Дата создания: {{ $article->created_at->format('d.m.Y') }}--}}
    {{--</div>--}}
</div>