@extends('layouts.layout')

@section('content')
    <h1>Užsakymų sąrašas </h1>
    <hr>
    <script type="text/javascript" src="{{ asset('js/add.js') }}"></script>

    <a href="{{url('orders/1/edit')}}" class="btn btn-default">Sukurti naują užsakymą</a> <br><br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Sukūrimo data</th>
                <th>Suma</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->created_at}}</td>
                    <td>{{ sprintf('%01.2f',$order->sum)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection