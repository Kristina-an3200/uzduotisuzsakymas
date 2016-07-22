@extends('layouts.layout')

@section('content')

    @include('partials.alerts.errors')

    <h1>Užsakymo tvarkymas </h1>
    <hr>

    <div class="input_fields_wrap">
        <button class="add_field_button">Pridėti prekę</button>
        <div><input type="hidden" name="mytext[]"></div>
    </div>

    <script type="text/javascript" src="{{ asset('js/add.js') }}"></script>

    {{ Form::open( [
        'method' => 'PATCH',
        'route' => ['orders.update', 1],
        'id' => 'orders_form'
        ]) }}

        <th>Pavadinimas</th>
        <th>Kiekis</th>
        <th>Kaina</th>

    @foreach($orders as $order)

        <div class="form-group">
            {{ Form::label("order[$order->id][name]", ' ', ['class' => 'control-label']) }}
            {{ Form::text("order[$order->id][name]", $order->name, ['class' => 'form-control']) }}

            {{ Form::label("order[$order->id][quantity]", ' ', ['class' => 'control-label']) }}
            {{ Form::text("order[$order->id][quantity]", $order->quantity, ['class' => 'form-control']) }}

            {{ Form::label("order[$order->id][price]", ' ', ['class' => 'control-label']) }}
            {{ Form::text("order[$order->id][price]", sprintf('%01.2f', $order->price), ['class' => 'form-control']) }}

            <a href="#" class="remove_field">X</a>
        </div>

    @endforeach

    {{ Form::close() }}

    <hr>

    Bendra suma: {{ sprintf('%01.2f', $total)}}<br>

    {{ Form::submit('Išsaugoti', ['class' => 'btn btn-primary', 'form' => 'orders_form']) }}

@endsection