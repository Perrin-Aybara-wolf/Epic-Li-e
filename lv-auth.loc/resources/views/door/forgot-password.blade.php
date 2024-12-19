@extends('layouts.log_reg')

@section('title', 'Forgot PW')

@section('come', 'Увыйты')

@section('form')
<form class="login-form" style="height: 390px" action="{{route('password.email')}}" method="post">
    @csrf
    <input type="email" value="{{old('email')}}" name="email" id="email" placeholder="E-Mail" class="input-field
@error('email') is-invalid @enderror">
    @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <button type="submit" class="login-button"><p>Восстановить пароль</p></button>
</form>
@endsection