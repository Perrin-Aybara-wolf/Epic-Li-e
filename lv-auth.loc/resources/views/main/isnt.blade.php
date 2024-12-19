@extends('layouts.main')

@section('css_card', `<link rel="stylesheet" href="{{asset('css/card.css')}}" />`)
@section('css_page', `<link rel="stylesheet" href="{{asset('css/main.css')}}" />`)
@section('scripts')
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
@endsection
@section('content')

<div style="width: 100%; height: 100%; display:flex; align-items: center; justify-content: center;">
    <img src={{asset('img/all_img/slurzba/wait_isnt_website.png')}} />
</div>

@endsection