@extends('layouts.main')

@section('css_page') 
<link rel="stylesheet" href="{{asset('css/options.css')}}" />
@endsection
@section('scripts')
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@endsection
@section('content')
<div class="settings-container">
        <section class="section">
            <h2>Загальні налаштування</h2>

            <div class="grid-layout">
                <h3>Акаунт</h3>
                <p>Логін (нікнейм)</p>
                <span></span>
                <button class="edit-btn">Редагувати</button>

                <p>Email</p>
                <span></span>
                <button class="edit-btn">Редагувати</button>

                <p>Ім'я</p>
                <span></span>
                <button class="edit-btn">Редагувати</button>

                <p>Пароль</p>
                <span></span>
                <button class="edit-btn">Редагувати</button>

                <p>Скинути акаунт</p>
                <span></span>
                <button class="info-btn">Дізнатися більше</button>

                <p>Видалити акаунт</p>
                <span></span>
                <button class="info-btn">Дізнатися більше</button>

                <h3>Способи входу</h3>
                <p>Apple</p>
                <span></span>
                <button class="connect-btn">Підключити</button>

                <p>Google</p>
                <span></span>
                <button class="connect-btn">Підключити</button>

                <h3>Сайт</h3>
                <p>Мова</p>
                <span>Українська</span>
                <button class="edit-btn">Редагувати</button>

                <p>Формат дати</p>
                <span>MM/dd/yyyy</span>
                <button class="edit-btn">Редагувати</button>

                <p>Регулювання початку дня</p>
                <span>Default(12:00 AM)</span>
                <button class="edit-btn">Редагувати</button>

                <p>Аудіотема</p>
                <span>Тема від Rosstavo</span>
                <button class="edit-btn">Редагувати</button>

                <p>Призупинити шкоду</p>
                <span></span>
                <button class="info-btn">Дізнатися більше</button>

                <h3>Персонаж</h3>
                <p>Виправити дані</p>
                <span></span>
                <button class="edit-btn">Редагувати</button>

                <p>Змінити клас</p>
                <span></span>
                <button class="edit-btn">Редагувати</button>
            </div>
        </section>
    </div>
@endsection