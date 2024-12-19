@extends('layouts.main')

@section('css_page') 
<link rel="stylesheet" href="{{asset('css/premium.css')}}" />
@endsection
@section('scripts')
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
@endsection
@section('content')
    <header class="header">
        <h1>Підтримка <img style="position: relative; top: 18px;" src={{asset("img/all_img/premium/Epic_Life.png")}} alt="art"></h1>
    </header>

    <div class="container">
        <div class="left-side-content">
            <h2>Підписники отримують ці корисні переваги!</h2>
            <ul class="benefits-list">
                <li style="margin-right: -27px;">
                    <img src={{asset("img/all_img/premium/Драгми.png")}} alt="Gem Icon">
                    <p><strong style="font-size: 24px; text-align: center; line-height: 27.74px; color: #204547;">Придбати драгми за золото</strong><br>Торговець (+ ГМ) тепер продаватиме вам самоцвіти на ринку по 10 золота за кожен!</p>
                </li>
                <li>
                    <img src={{asset("img/all_img/premium/Posoch.png")}} alt="Item Icon">
                    <p><strong style="font-size: 24px; text-align: center; line-height: 27.74px; color: #204547;">Щомісячні таємничі предмети</strong><br>Унікальне спорядження, яким ви щомісяця прикрашаєте свій аватар.</p>
                </li>
                <li>
                    <img style="margin-left: 28px;" src={{asset("img/all_img/premium/Сундук_откр.png")}} alt="Chance Icon">
                    <p><strong style="font-size: 24px; text-align: center; line-height: 27.74px; color: #204547;">Подвойте шанс випадіння предметів</strong><br>Відкрийте для себе ще більше предметів у EpicLife за допомогою збільшеного у 2 рази шансу їх випадіння з колеса фортуни.</p>
                </li>
            </ul>
        </div>

        <div class="box-container">
            <div class="payment-options">
                <div class="method-top-image" style="background-image: url('{{asset("img/all_img/premium/stck_hor.png")}}');"></div>
                <div class="payment-item">
                    <div class="payment-image" style="background-image: url('{{asset("img/all_img/premium/Rectangle_612.png")}}');">
                        <p>Автоматичний платіж $5 раз у 1 міс.</p>
                    </div>
                </div>
                <div class="payment-item">
                    <div class="payment-image" style="background-image: url('{{asset("img/all_img/premium/Rectangle_613.png")}}');">
                        <p>Автоматичний платіж $15 раз у 3 міс.</p>
                    </div>
                </div>
                <div class="payment-item">
                    <div class="payment-image" style="background-image: url('{{asset("img/all_img/premium/Rectangle_613.png")}}');">
                        <p>Автоматичний платіж $30 раз у 6 міс.</p>
                    </div>
                </div>
                <div class="payment-item">
                    <div class="payment-image" style="background-image: url('{{asset("img/all_img/premium/Rectangle_613.png")}}');">
                        <p>Автоматичний платіж $48 раз у 12 міс.</p>
                    </div>
                </div>
                <img class="method-right-image" src='{{asset("img/all_img/premium/stck_hor.png")}}'>
                <img class="method-left-image" src='{{asset("img/all_img/premium/stck_hor.png")}}'>
            </div>

            <div class="payment-method-section">
                <h3>Виберіть спосіб оплати</h3>
                <div class="payment-methods">
                    <button class="method">Банківська карта</button>
                    <button class="method"><img src={{asset("img/all_img/premium/PayPal_logo.png")}} alt="paypal"></button>
                    <button class="method"><img src={{asset("img/all_img/premium/amazon_pay.png")}} alt="amazon"></button>
                </div>
                <img class="method-bottom-image" src='{{asset("img/all_img/premium/stck_hor.png")}}'>
            </div>
        </div>
    </div>

    <div class="footer">
        <img style="margin-bottom: -10px; margin-top: -40px;" src={{asset("img/all_img/premium/podarok.png")}} alt="podarok">
        <p>Хочете подарувати переваги підписки комусь іншому?</p>
        <a href="#" class="gift-link">Подарувати зараз</a>
    </div>
@endsection