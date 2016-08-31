<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="prderModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оставить заявку</h4>
            </div>

            {{ Form::open(['route' => 'order', 'method' => 'post']) }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Ваше имя') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                        @if ($errors->has('name'))
                            <div class="help-block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{ Form::label('email', 'Ваш e-mail') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                        @if ($errors->has('email'))
                            <div class="help-block">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {{ Form::label('phone', 'Ваш телефон') }}
                        {{ Form::text('phone', null, ['class' => 'form-control']) }}
                        @if ($errors->has('phone'))
                            <div class="help-block">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        {{ Form::label('message', 'Комментарий к заказу') }}
                        {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3]) }}
                        @if ($errors->has('message'))
                            <div class="help-block">{{ $errors->first('message') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>