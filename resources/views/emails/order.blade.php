<h1>Заявка с сайта</h1>

<p>Дата создания: {{ \Carbon\Carbon::now()->format('d.m.Y H:i') }}</p>

<ul>
    <li><strong>Имя:</strong> {{ $name }}</li>
    <li><strong>E-mail:</strong> {{ $email }}</li>
    <li><strong>Телефон:</strong> {{ $phone }}</li>
    <li><strong>Комментарий:</strong> {{ $comment }}</li>
</ul>

<p>Выбранный товар:</p>
<p><img src="{{ $image }}"></p>
