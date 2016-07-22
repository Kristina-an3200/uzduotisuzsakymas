<div class="row">
    <div class="col-lg-6">

        @if($errors)
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        <div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
            {{ Form::label('name', 'Pavadinimas') }}
            {{ Form::text('name', null, [
                'class' => 'form-control',
            ]) }}
            @if ($errors->has('name'))
                <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>

        <div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
            {{ Form::label('quantity', 'Kiekis') }}
            {{ Form::textarea('quantity', null, [
                'class' => 'form-control',
                'placeholder' => "1"
            ]) }}
            @if ($errors->has('quantity'))
                <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                    {{ $errors->first('quantity') }}
                </p>
            @endif
        </div>

        <div class="form-group @if($errors->has('time')) has-error @endif">
            {{ Form::label('price', 'Kaina') }}
            {{ Form::number('price', null, [
                'class' => 'form-control',
                'placeholder' => "4.00",
                'min' => "0.01",
                'step' => "0.01",
            ]) }}
            @if ($errors->has('price'))
                <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                    {{ $errors->first('price') }}
                </p>
            @endif
        </div>

        {{ Form::button('Išsaugoti', [
            'type' => 'submit',
            'class' => 'btn btn-primary'
        ]) }}
    </div>
</div>
