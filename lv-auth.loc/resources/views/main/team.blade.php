@extends('layouts.main')

@section('css_page') 
<link rel="stylesheet" href="{{asset('css/team.css')}}" />
@endsection
@section('scripts')
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@endsection
@section('content')
<div class="flex-cntr" style="flex-direction: column;">
    <div class="central-content flex-cntr">
        <img style="z-index: 0; position: absolute; height: 421px;" src={{asset("img/all_img/звёзды.png")}} alt="zcezdo4ki">
        <div class="characters flex-cntr">
            <div class="character-wrapper">
                <img src={{asset("img/all_img/narrators/narrator1.png")}} alt="Character 1" class="character">
                <img src={{asset("img/all_img/тень.png")}} alt="Additional Character 1" class="additional-photo">
            </div>
            <div class="character-wrapper">
                <img src={{asset("img/all_img/narrators/narrator2.png")}} alt="Character 2" class="character lower">
                <img src={{asset("img/all_img/тень.png")}} alt="Additional Character 2" class="additional-photo">
            </div>
            <div class="character-wrapper">
                <img src={{asset("img/all_img/narrators/narrator3.png")}} alt="Character 3" class="character">
                <img src={{asset("img/all_img/тень.png")}} alt="Additional Character 3" class="additional-photo">
            </div>
        </div>
        <h1 style="font-size: 30px;line-height: 34.68px; margin-bottom: 16px;margin-top: 27.37px; ">Вашій
            команді потрібно щось більше?</h1>
        <p style="font-size: 24px; line-height: 27.74px; width: 683px; text-align: center; z-index: 1;">Керуйте
            невеликою
            командою та отримуйте доступ! Створіть нові групові плани задач. Ваш ексклюзивний
            доступ до підняття рівня задач групи, призначений для вас і членів вашої групи!</p>
        <p class="price-info">ВСЬОГО $5 на місяць $2 за додаткового члена</p>
        <button class="main-button">Почати!</button>
        <p class="terms">*підписка на місячна підписка</p>
    </div>


    <section class="main-content">
        <div style="grid-area: 1/1;">
            <h2 class="section-title">Командний список завдань:</h2>
            <p class="description" style="font-size: 24px; width: 383px;">
                Налаштуйте для групи спільний список завдань для легкого перегляду. Призначайте завдання своїм колегам
                або дозволяйте їм оголошувати свої завдання, щоб було зрозуміло, над чим кожен працює!</p>
        </div>
        <div class="invitations" style="grid-area: 2/1;">
            <div class="card">
                <form class="side">
                    <input type="checkbox" />
                </form>
                <p class="text name">Мої запрошення</p>
                <p class="text description">30/10/2024</p>
                <div class="bottom-crd">
                    <p class="authors">Ви і ще 2 людини</p>
                </div>
            </div>

            <div class="super-card">
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <p class="text name">Не забудь поставити м’ясо до холодильнику</p>
                </div>
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <p class="text name">Не забудь поставити м’ясо до холодильнику</p>
                </div>
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <p class="text name">Не забудь поставити м’ясо до холодильнику</p>
                    <div class="bottom-crd">
                        <p class="authors">Ви і ще 2 людини</p>
                    </div>
                </div>
            </div>
        </div>

        <div style="grid-area: 1/2;">
            <div class="card">
                <form class="side">
                    <input type="checkbox" />
                </form>
                <p class="text name">Не забудь поставити м’ясо до холодильнику</p>
                <div class="bottom-crd">
                    <p class="authors">Ви і ще 2 людини</p>
                </div>
            </div>

            <div class="card">
                <form class="side">
                    <input type="checkbox" />
                </form>
                <p class="text name">Викинути сміття або здати на переробку</p>
                <div class="bottom-crd">
                    <p class="authors">Ви і ще 2 людини</p>
                </div>
            </div>

            <div class="card">
                <form class="side">
                    <input type="checkbox" />
                </form>
                <p class="text name">Викинути сміття або здати на переробку</p>
                <div class="bottom-crd">
                    <p class="authors">Ви і ще 2 людини</p>
                </div>
            </div>
        </div>
        <div class="group-tools" style="grid-area: 2/2;">
            <h2 class="section-title">Інструменти управління групою</h2>
            <p class="description" style="font-size: 24px; width: 383px;">Переглядайте статус завдань, щоб переконатися,
                що його виконано, додайте менеджерів груп, щоб
                розділити обов’язки, і насолоджуйтеся приватним груповим чатом для всіх членів команди.</p>
        </div>
    </section>

    <section class="bonus-section">
        <div class="bonus-icon">
            <img style="width: 64px; height: 64px; margin-bottom: 30px;" src={{asset("img/all_img/Сундук.png")}} alt="Bonus Icon">
        </div>
        <p style="text-align: center; font-size: 30px; line-height: 34.68px; color: #204547; margin-bottom: 18px;">
            Внутрішньо-ігрові бонуси</p>
        <p style="text-align: center; width: 760px; font-size: 24px; color: #204547; line-height: 27.74px;">Члени
            отримують
            доступ до секретних костюмів, а також нові переваги підписки, включаючи спеціальні наборки
            спорядження та можливість придбати саморобні товари.</p>
    </section>

    <section class="create-group">
        <h2 style="margin-top: 142px; font-size: 30px; line-height: 34.68px; text-align: center;">Створіть свою групу
            сьогодні!!</h2>
        <p
            style="font-size: 24px; line-height: 27.74px; text-align: center; margin-top: 16px; margin-bottom: 32px; color: #204547;">
            Всього <span style="color: #43845E;">$5</span>на місяць <span style="color: #43845E;">$2</span>за учасника
        </p>
    </section>
    <button class="main-button">Почати!</button>
    <p class="terms" style="margin: 0;">*оплачується як місячна підписка</p>
</div>
@endsection