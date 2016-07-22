@extends('layouts.layout')

@section('title')
    Užduotis
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h3>Naujo vartotojo registracija</h3><br>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Jūsų email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">Jūsų vardas</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="first_name">Jūsų pavardė</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Slaptažodis</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Patvirtinti</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Prisijungite</h3> <br>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Jūsų email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Slaptažodis</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Patvirtinti</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
