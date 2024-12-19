@extends('layouts.log_reg')

@section('title', 'Reset PW')

@section('come', 'Приєднатись')

@section('form')
<form action="{{route('password.update')}}" method="get">
    @csrf

    <input type="hidden" name="token" value="{{$token}}">
    <div class="login-form" style="height: calc(var(--k)*3.9);">
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
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повторіть пароль"
            class="input-field">
    </div>
    <button type="submit" class="login-button">
        <p>Восстановить пароль</p>
    </button>
</form>
@endsection