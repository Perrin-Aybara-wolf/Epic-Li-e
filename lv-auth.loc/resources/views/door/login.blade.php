@extends('layouts.log_reg')

@section('title', 'Login EL')

@section('come', 'Увiйти')

@section('form')
<form class="login-form" style="height: 390px" action="{{route('login.auth')}}" method="post">
    @csrf
    <input type="email" value="{{old('email')}}" name="email" id="email" placeholder="E-Mail" class="input-field
@error('email') is-invalid @enderror">
    @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <input type="password" name="password" placeholder="Пароль" class="input-field
@error('password') is-invalid @enderror">
    @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <label style="color: white" for="remember">Запомнить меня</label>
    <input type="checkbox" name="remember" id="remember"/>

    <button type="submit" class="login-button"><p>Увiйти</p></button>
</form>

<a href="{{route('password.request')}}">Забыли пароль?</a>
@endsection