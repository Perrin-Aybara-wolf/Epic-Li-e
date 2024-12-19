<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('img/all_img/24.png')}}" />
    @yield('css_page')
    @yield('css_card')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('css/studing.css')}}" />
    <link rel="stylesheet" href="{{asset('css/header.css')}}" />
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" href="{{asset('css/acordion_menu.css')}}" />
    <link rel="stylesheet" href="{{asset('css/inventory.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Underdog:wght@400;700&display=swap" rel="stylesheet">
    @yield('css_bootstrap')
    <style>
        body {
            --icon_clock: url('{{asset('img/all_img/icons/clock.png')}}');
            --icon_kalendar: url('{{asset('img/all_img/icons/kalendar.png')}}');
        }

        .cloud {
            background-image: url('{{asset('img/all_img/slurzba/хмара.png')}}');
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <img class="nasl" src={{asset('img/all_img/наследили.png')}} />
        <div class="nav-left">
            <img class="logo" src="{{asset('img/image/24.png')}}" alt="Game Logo" height="75px" width="71px">
            <ul class="nav-menu">
                <li class={{!empty($link) && $link === 'main' ? 'active' : ''}}><a
                        href="{{asset(route('main'))}}">Завдання</a></li>
                <li class={{!empty($link) && $link === 'rozpisanie' ? 'active' : ''}}><a
                        href="{{asset('rozpisanie/?date=' . date('Y-m-d'))}}">Розклад</a></li>
                <li class={{!empty($link) && $link === 'shop' ? 'active' : ''}}><a
                        href="{{asset(route('shop'))}}">Крамниця</a></li>
                <!-- <li class={{!empty($link) && $link === 'main'? 'active': ''}}><a href="{{asset(route('team'))}}">Команда</a></li> -->
                <li class={{!empty($link) && $link === 'team' ? 'active' : ''}}><a
                        href="{{asset(route('team'))}}">Спільнота</a></li>
                <li class={{!empty($link) && $link === 'quest' ? 'active' : ''}}><a
                        href="{{asset(route('quest'))}}">Випробування</a></li>
                <li class={{!empty($link) && $link === 'statistic' ? 'active' : ''}}><a
                        href="{{asset(route('statistic'))}}">Статистика</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="currency-icons">
                <img src="{{asset('img/image/kristal.png')}}" alt="Water Currency">
                <span>{{auth()->user()->DM}}</span>
                <img src="{{asset('img/all_img/icons/gold.png')}}" alt="Coin Currency">
                <span>{{auth()->user()->GM}}</span>
            </div>
            <div class="nav-icons">
                <a href="{{route('chat')}}"><img src="{{asset('img/all_img/icons/чат.png')}}" alt="Chat"></a>
                <div class="accordion-button">
                    <img src="{{asset('img/all_img/icons/чел.png')}}" alt="User Profile">
                </div>
            </div>
        </div>
    </nav>

    <header class="header-background">
        <div class="header-container">
            <div class="profile-section">




                <!-- <div class="porfie-fone">
                    <img src="{{asset('img/all_img/фон.png')}}" />
                    <div class="profile-image">
                        <img src="{{asset('img/all_img/items/its_me.png')}}" alt="Profile Icon">
                    </div>
                </div> -->



                <div class="character-room"
                    style="background-color: #232323; background-image: url({{asset('img/all_img/фон.png')}}); background-size: auto 80%; background-position: top;">

                    <!-- <img src="{{asset('img/all_img/фон.png')}}" /> -->
                    <img src={{asset("img/all_img/items/Чувак.png")}} alt="Character">
                    <img src={{asset("img/all_img/items/Очі.png")}} alt="Очі">
                    <img src='' id="head"
                        onerror='this.onerror = null; this.src ="{{asset("img/all_img/items/Зачіска.png")}}"'
                        alt="Head">
                    <img src='' id="body"
                        onerror='this.onerror = null; this.src ="{{asset("img/all_img/items/Початкова_одежа.png")}}"'
                        alt="Body">
                    <img src={{asset("img/all_img/items/Сережки.png")}} alt="Сережки">
                    @foreach (auth()->user()->wearGroup as $item)
                        @if ($item->body !== 'head' && $item->body !== 'body')
                            <img src={{asset('img/all_img/'.$item->wear_img)}} id={{$item->body}} crd_id={{$item->id}} alt="Hat" />
                        @endif
                    @endforeach

                </div>






                <div class="inv-box"><img src="{{asset('img/all_img/Сундук.png')}}" alt="Profile Icon"></div>
                <div class="user-info">
                    <p class="username">{{auth()->user()->name}}</p>
                    <p class="user-email">{{auth()->user()->email}}</p>
                    <div class="user-progress">
                        <div class="progress-grid">
                            <img src={{asset('img/all_img/icons/Серце.png')}} />
                            <div class="progress-line">
                                <div class="progress-bar red" style="width:{{auth()->user()->Hp}}%"></div>
                                <img src={{asset('img/all_img/рамка_здоровья.png')}} />
                            </div>
                            <img src={{asset('img/all_img/icons/Сила_духа.png')}} />
                            <div class="progress-line">
                                <div class="progress-bar blue" style="width:{{auth()->user()->Fight_Soul}}%"></div>
                                <img src={{asset('img/all_img/рамка_здоровья.png')}} />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-text">
                <h2>Перемагайте монстрів разом з друзями</h2>
                <p>Створіть власну команду або приєднайтесь до вже існуючої, щоб виконувати квести та підвищити свою
                    мотивацію</p>
                <button>Почати</button>
            </div>
        </div>
        <div class="menu-container">
            <ul class="menu_">
                <li><a href="#">Характеристики</a></li>
                <li><a href="#">Досягнення</a></li>
                <li><img src={{asset("img/all_img/stick.png")}} alt="Фото 1" class="menu-photo"></li>
                <li><a href="{{route('options')}}">Налаштування</a></li>
                <li><a href="{{route('premium')}}">Підписка</a></li>
                <li><a href="{{route('logout')}}">Вийти</a></li>
                <li><img src={{asset("img/all_img/stick.png")}} alt="Фото 2" class="menu-photo"></li>
            </ul>
            <div class="info-section">
                <p>Хочеш дізнатися більше про жителів Epic Life? Тоді завітай до нашого Ютуб-каналу</p>
                <!-- <div class="youtube-link"> -->
                <a href="https://www.youtube.com/@Epic-Life_Company" target="_blank"><img
                        src={{asset("img/all_img/yt.png")}} alt="YouTube" /></a>

                <div class="bottom">
                    <div class="reminder">
                        <img src={{asset("img/all_img/slurzba/свиток1.png")}} alt="Не забудь про підписку!">
                        <span class="reminder-text">І не забудь про підписку!</span>
                    </div>
                    <img src={{asset("img/all_img/narrators/narrator" . rand(1, 3) . ".png")}} alt="Character">
                </div>
            </div>
        </div>
    </header>
    <?php
$inv_user = auth()->user()->inventory;
$body = ['head', 'body', 'legs', 'foots', 'l_arm', 'r_arm']
?>


    <div class="shtora">

        <div class="inventory_desk">
            <div class="container">
                <div class="inventory">
                    <div class="header">
                        <h2>Спорядження</h2>
                    </div>
                    @for ($i = 0; $i < count($body); $i++)
                        @if (auth()->user()->countGroup($body[$i]) > 0)
                            <div class="carousel-wrapper">
                                <div class="grid-row" id="row{{$i}}">
                                    @foreach($inv_user as $item)
                                        @if ($item->body === $body[$i])
                                            <div class="item" crd_id="{{$item->id}}">
                                                <img src={{asset('img/all_img/'.$item->path_img)}} wear={{asset('img/all_img/'.$item->wear_img)}} alt="Item 1">
                                                <img class="border_itm"
                                                    src="{{asset('img/all_img/рамки/Рамка_длинная_серебро.png')}}" />
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>

                <!-- <div class="character-view"> -->
                <!-- <div class="character-background"> -->
                <!-- <div class="character-container">
                            <img src={{asset("img/all_img/items/человек.png")}} alt="Character" class="character">
                        </div> -->
                <!-- <img src="img/Шляпа.png" alt="Hat" class="ite hat">
                        <img src="img/5имени-2.png" alt="Armor" class="ite armor">
                        <img src="img/Меч (1).png" alt="Sword" class="ite sword">
                        <img src="img/Щит.png" alt="Shield" class="ite shield">
                        <img src="img/Батинки (1).png" alt="Boots" class="ite boots">
                        <img src="img/Штаники.png" alt="Pants" class="ite pants"> -->


                <div class="right_zone">
                    <div>
                        <button onclick="up_close()">Применить</button>
                        <button class="reset" onclick="closeReset()">Сбросить</button>
                    </div>
                </div>



                <!-- </div> -->
                <!-- </div> -->
            </div>

        </div>

        @yield('html_card')
    </div>

    @yield('content')

    @include('layouts.footer')

    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="{{asset('js/header.js')}}">
        clouds(true)
    </script>
    <script>
        // progress = [0, 0, -1];  *
        progress = [0, {{auth()->user()->study}}, -1];
        let border_gold = '{{asset('img/all_img/рамки/Рамка_длинная_золотая.png')}}',
            border_aurum = '{{asset('img/all_img/рамки/Рамка_длинная_серебро.png')}}';

        $('.nav-menu li:nth-child(3)>a').on('mouseup', () => {
            if ({{auth()->user()->study}} === 0)
                upLvl()
        })
        $(() => {
            $('.inventory').on('click', '.item', (e) => {
                let border = $(e.target);
                border.closest('.grid-row').find('.active').attr('src', border_aurum)
                border.attr('src', border_gold)
                border[0].classList.add('active')

                console.log(user_close_img)
            })

        })
        function upLvl() {
            $.ajax({
                type: "POST",
                url: '{{route('upLvl')}}',
                headers: {
                    'X-CSRF-Token': '{{csrf_token()}}'
                },
            })
        }
        function up_close() {
            $.ajax({
                type: 'POST',
                url: '{{route('inventory.update')}}',
                data: user_close_img,
                // data: {
                //     data: tasks_data,
                //     // day: formatDate(currentDate),
                // },
                headers: {
                    'X-CSRF-Token': '{{csrf_token()}}'
                },
                // fail: () => { alert("всё пропало") },
                // success: (data) => {
                //     console.log(data)
                // },
                // error: () => {
                //     alert('Не подключились')
                // },
            })
        }
    </script>
    <script>
        function updateTask(data) {
            data = upFormData(data.get('column'), crd_id);
            $.ajax({
                method: "POST",
                url: "{{route('task.update')}}",
                data: data,
                processData: false,
                contentType: false,
                fail: () => { alert("всё пропало") },
                success: (data) => {
                    // alert('success update')
                    console.log(data.original)

                    @if (!empty($link))
                        @if ($link === 'main')
                            $(`.task[crd_id='${data.original.id}']`).remove();
                            add_card(data.original.id, data.original.column, data.original.name, data.original.description);
                        @endif
                        @if ($link === 'rozpisanie')
                            update_schedule()
                        @endif
                        $('.shtora').first().css('display', 'none');
                        $('.card_body').first().css('display', 'none');
                    @endif
                },
                error: (e) => {
                    alert('error update')
                    console.log(e.responseText)
                }
            })
        }
    </script>
    @yield(section: 'scripts')
    <!-- @for ($i = 0; $i < 10; $i++)
        <div class="cloud left"></div>
        <div class="cloud right"></div>
    @endfor -->
</body>

</html>