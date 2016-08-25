@if ($errors->count())
    <div class="alert alert-danger">
        <strong>При загрузке видео возникли следующие ошибки:</strong><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif