@if ($errors->count())
    <div class="alert alert-danger">
        <p><strong>При отправке формы возникли следующие ошибки:</strong></p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif