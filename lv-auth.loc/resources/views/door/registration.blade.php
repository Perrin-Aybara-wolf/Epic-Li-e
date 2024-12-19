@extends('layouts.log_reg')

@section('title', 'Reg EL')

@section('come', 'Приєднатись')

@section('form')
<form action="{{route('user.store')}}" method="post">
    @csrf
    <!-- <div class="login-form" style="height: calc(var(--k)*3.9);"> -->
    <div class="login-form">
        <input type="text" value="{{old('name')}}" name="name" id="name" placeholder="Ваш нік-нейм" class="input-field
@error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
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
    <button type="submit" class="login-button"><p>Приєднатись</p></button>
</form>
@endsection