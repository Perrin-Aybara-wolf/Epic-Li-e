@extends('layouts.main')

@section('css_page')
<link rel="stylesheet" href="{{asset('css/chat.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('scripts')
<!-- <script src="{{asset('js/jquery-3.7.1.js')}}"></script> -->
<script src="{{asset('js/chat.js')}}"></script>
@endsection
@section('content')
<div class="container">

  <!-- Левая панель -->
  <div class="sidebar">
    <button class="toggle-widget-btn"><i class="fas fa-bars"></i></button>
    <div class="chat-list">
      <!-- <div class="chat-item active">
        <div class="chat-image"></div>
        <div class="chat-name">Чат 1</div>
      </div> -->
      @for ($i = 0; $i < 3; $i++)
      <div class="chat-item">
        <div class="chat-image {{$i === 0? 'active' : ''}}" style="background-image: url('{{asset('img/all_img/narrators/narrator'.($i+1).'.png')}}');"></div>
        <div class="chat-name">Чаклун {{$i+1}}</div>
      </div>
    @endfor
    </div>
  </div>

  <!-- Чат -->
  <div class="main-chat">
    <div class="chat-header">
      <div class="header-image"></div>
      <span>Чат 1</span>
    </div>

    <div class="chat-messages"></div>

    <div class="chat-input-area">
      <div class="chat-icons">
        <i id="emoji-btn" class="fa fa-smile-o"></i>
      </div>
      <input type="text" id="chat-input" placeholder="Type...">
      <button id="send-btn">Send</button>
      <div class="chat-icons">
        <i class="fa fa-microphone"></i>
      </div>
    </div>
  </div>

  <!-- Правая панель -->
  <div class="right-widget collapsed">
    <button class="toggle-widget-btn widget-toggle collapsed">
      <i class="fas fa-arrow-right"></i>
    </button>

    <div class="widget-section">
      <h3>Запросити у команду
        <i class="fas fa-ellipsis-v" style="float: right; cursor: pointer;"></i>
      </h3>
    </div>

    <div class="widget-section">
      <h3 class="toggle-header">Подробиці квесту <i class="fas fa-chevron-down toggle-section"></i></h3>
      <div class="toggle-content">
        <img src={{asset("img/all_img/icons/Свиток.png")}} alt="Quest Image" class="widget-image">
        <p>Ваша команда не бере участь у квесті.</p>
        <p>Квести допомагають гравцям зосередитись на довготривалих внутрішньоігрових цілях разом із членами їх команди.
        </p>
        <button>Обрати квест</button>
      </div>
    </div>

    <div class="widget-section">
      <h3 class="toggle-header">Опис <i class="fas fa-chevron-down toggle-section"></i></h3>
      <div class="toggle-content">
        <p>Опис контенту здесь...</p>
      </div>
    </div>

    <div class="widget-section">
      <h3 class="toggle-header">Випробування <i class="fas fa-chevron-down toggle-section"></i></h3>
      <div class="toggle-content">
        <img src={{asset("img/all_img/icons/Рупор.png")}} alt="Test Image" class="widget-image">
        <p>Ця спільнота не має випробувань.</p>
        <p>Випробування — це спільна подія, у якій гравці змагаються та заробляють призи, виконуючи групу пов'язаних між
          собою завдань.</p>
        <button>Скасувати Випробування</button>
      </div>
    </div>
  </div>
</div>

@endsection