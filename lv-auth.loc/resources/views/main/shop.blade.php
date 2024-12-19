@extends('layouts.main')

@section('css_page')
<link rel="stylesheet" href="{{asset('css/shop.css')}}" />
@endsection
@section('css_card')
<link rel="stylesheet" href="{{asset('css/card_quest.css')}}" />
<link rel="stylesheet" href="{{asset('css/card_items.css')}}" />
@endsection
@section('css_bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('title', 'Shop')
@section('scripts')
@if (auth()->user()->study === 0)
    <script src="{{asset('js/study.js')}}"></script>
@endif
<script src={{asset('js/shop.js')}}></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


<script>

    $('.product-grid').on('click', '.product-card', (e) => {
        let crd_id = getCard(e.target, '.product-card').attr('crd_id');

        $.ajax({
            type: 'GET',
            url: "invetories/" + crd_id,
            // data: { id: },
            processData: false,
            contentType: false,
            success: (data) => {
                // console.log(data);
                // alert('success');
                let item_card = $('.item-card');
                item_card.attr('item_id', crd_id)

                item_card.find('.name').text(data.name)
                item_card.find('.description').text(data.description)

                item_card.find('.str').text(data.str)
                item_card.find('.str_atak').text(data.str_atak)
                item_card.find('.str_armor').text(data.str_armor)

                item_card.find('.intel').text(data.intel)
                item_card.find('.intel_atak').text(data.intel_atak)
                item_card.find('.intel_armor').text(data.intel_armor)

                item_card.find('.dex').text(data.dex)
                item_card.find('.dex_atak').text(data.dex_atak)
                item_card.find('.dex_armor').text(data.dex_armor)

                item_card.find('.tilo').text(data.tilo)
                item_card.find('.tilo_atak').text(data.tilo_atak)
                item_card.find('.tilo_armor').text(data.tilo_armor)

                item_card.find('.coin').text('')
                if (data.gm > 0) {
                    item_card.find('.coin').text(data.gm)
                    item_card.find('.coin').css('display', 'block')
                }
                else item_card.find('.coin').css('display', 'none')

                item_card.find('.kristal').text('')
                if (data.dm > 0) {
                    item_card.find('.kristal').text(data.dm)
                    item_card.find('.kristal').css('display', 'block')
                }
                else item_card.find('.kristal').css('display', 'none')


if (data.body === 'head') item_card.find('#head').attr('src', pathImg(data.wear_img))
else item_card.find('#head').attr('src', room.find('#head').attr('src'))
if (data.body === 'body') item_card.find('#body').attr('src', pathImg(data.wear_img))
else item_card.find('#body').attr('src', room.find('#body').attr('src'))
if (data.body === 'legs') item_card.find('#legs').attr('src', pathImg(data.wear_img))
else item_card.find('#legs').attr('src', room.find('#legs').attr('src'))
if (data.body === 'foots') item_card.find('#foots').attr('src', pathImg(data.wear_img))
else item_card.find('#foots').attr('src', room.find('#foots').attr('src'))
if (data.body === 'l_arm') item_card.find('#l_arm').attr('src', pathImg(data.wear_img))
else item_card.find('#l_arm').attr('src', room.find('#l_arm').attr('src'))
if (data.body === 'r_arm') item_card.find('#r_arm').attr('src', pathImg(data.wear_img))
else item_card.find('#r_arm').attr('src', room.find('#r_arm').attr('src'))









                console.log(data.body);
            },
            error: (e) => {
                alert('error')
                $('input[type=submit]').prop('disabled', false)
            },
        })
    })

    $('.buy-button').on('click', (e) => {
        let raznc_gm = $('#user_gm').text() - $('#it_gm').text(),
            raznc_dm = $('#user_dm').text() - $('#it_dm').text();

        // console.log('gold_us: ' + $('#user_gm').text() + " " + 'kristal_us: ' + $('#user_dm').text());
        // console.log('gold_it: ' + $('#it_gm').text() + " " + 'kristal_it: ' + $('#it_dm').text());

        // console.log('gold_us: ' + ($('#user_gm').text() - $('#it_gm').text()) + " " + 'kristal_us: ' + ($('#user_dm').text() - $('#it_dm').text()));

        if (raznc_gm >= 0 && raznc_dm >= 0) {
            // alert('kupili')

            $('#user_gm').text(raznc_gm)
            $('#user_dm').text(raznc_dm)

            $.ajax({
                type: 'POST',
                url: '{{route('inventory.store')}}',
                headers: {
                    'X-CSRF-Token': '{{csrf_token()}}'
                },
                data: {
                    id: Number($(e.target).closest('.item-card').attr('item_id')),
                    user_gm: raznc_gm,
                    user_dm: raznc_dm,
                },
            })
        }
        else {
            alert('nie kupili')
        }
    })
</script>
@if (auth()->user()->study === 1)
    <script src="{{asset('js/study.js')}}"></script>
@endif
@endsection
@section('content')
<div class="tabs">
    <button class="tab-button active" onclick="openTab(event, 'market')">
        <p>Ринок</p>
    </button>
    <button class="tab-button" onclick="openTab(event, 'quests')">
        <p>Квести
    </button>
    <button class="tab-button" onclick="openTab(event, 'fair')">
        <p>Ярмарок
    </button>
</div>

<section id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000000000000000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src={{asset("img/all_img/ee9a22c0513dfe792345f61090e407b1.png")}} class="d-block w-100"
                alt="Hero Image 1">

            <div class="tab-content market active">
                <div class="product-grid">
                    @foreach ($inventories as $inventory)
                        @if (str_contains($inventory->type, 'close') || str_contains($inventory->type, 'potion'))
                            <div class="product-card" crd_id={{$inventory->id}}>
                                <div class="product-image-container">
                                    <img src={{asset('img/all_img/'.$inventory->path_img)}} alt="Product Image" class="product-image">
                                </div>
                                <div class="price">
                                    @if ($inventory->gm > 0)
                                        <img src={{asset("img/all_img/icons/gold.png")}} alt="Coin Icon">
                                        <span>{{$inventory->gm}}</span>
                                    @endif
                                    @if ($inventory->dm > 0)
                                        <img src={{asset("img/all_img/kristal.png")}} alt="Coin Icon">
                                        <span>{{$inventory->dm}}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-content quests">
                <h2>Квести</h2>
                <div>
                    <div class="quests-wrapper">
                        @foreach ($quests as $quest)
                            @if($quest->rynok_pos === 1)
                                <div class="quest-item" crd_id={{$quest->id}}>
                                    <img src={{$quest->path_icon_img}} alt="Квест картинка" class="quest-thumbnail">
                                    <div class="quest-details">
                                        <h3>{{$quest->name}}</h3>
                                        <p>Цікава робота, деякі загадкові головоломки і багато чудес чекає на вас!</p>
                                        <button class="quest-button">Перейти до квесту</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- @for ($i = 0; $i < rand(1, 2); $i++)
                                <div class="quest-item">
                                    <img src="image/Без имени-3 1.png" alt="Квест картинка" class="quest-thumbnail">
                                    <div class="quest-details">
                                        <h3>Примарна вечірка</h3>
                                        <p>Цікава робота, деякі загадкові головоломки і багато чудес чекає на вас!</p>
                                        <button class="quest-button">Перейти до квесту</button>
                                    </div>
                                </div>
                        @endfor -->
                    </div>
                </div>
                <div class="character-display">
                    <img src={{asset("img/all_img/narrators/big/Дiвчина_з_зiллям.png")}} alt="Персонаж"
                        class="character-image">
                </div>
            </div>


        </div>
        <div class="carousel-item">
            <img src={{asset("img/all_img/Ринок_Кузня.png")}} class="d-block w-100" alt="Hero Image 3">

            <div class="tab-content market active">
                <div class="product-grid">
                    @foreach ($inventories as $inventory)
                        @if (str_contains($inventory->type, 'armor') || str_contains($inventory->type, 'weapon'))
                            <div class="product-card" crd_id={{$inventory->id}}>
                                <div class="product-image-container">
                                    <img src={{asset('img/all_img/'.$inventory->path_img)}} alt="Product Image" class="product-image">
                                </div>
                                <div class="price">
                                    <img src={{asset("img/all_img/icons/gold.png")}} alt="Coin Icon">
                                    <span>{{$inventory->gm}}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-content quests">
                <h2>Квести</h2>
                <div>
                    <div class="quests-wrapper">
                        @foreach ($quests as $quest)
                            @if($quest->rynok_pos === 2)
                                <div class="quest-item" crd_id={{$quest->id}}>
                                    <img src={{$quest->path_icon_img}} alt="Квест картинка" class="quest-thumbnail">
                                    <div class="quest-details">
                                        <h3>{{$quest->name}}</h3>
                                        <p>Цікава робота, деякі загадкові головоломки і багато чудес чекає на вас!</p>
                                        <button class="quest-button">Перейти до квесту</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="character-display">
                    <img src={{asset("img/all_img/narrators/big/Кузнец.png")}} alt="Персонаж" class="character-image">
                </div>
            </div>


        </div>
        <div class="carousel-item">
            <img src={{asset("img/all_img/Ринок_Трактир.png")}} class="d-block w-100" alt="Hero Image 3">

            <div class="tab-content market active">
                <div class="product-grid">
                    @foreach ($inventories as $inventory)
                        @if (str_contains($inventory->type, 'food'))
                            <div class="product-card" crd_id={{$inventory->id}}>
                                <div class="product-image-container">
                                    <img src={{asset('img/all_img/'.$inventory->path_img)}} alt="Product Image" class="product-image">
                                </div>
                                <div class="price">
                                    <img src={{asset("img/all_img/icons/gold.png")}} alt="Coin Icon">
                                    <span>{{$inventory->gm}}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-content quests">
                <h2>Квести</h2>
                <div>

                    <div class="quests-wrapper">
                        @foreach ($quests as $quest)
                            @if($quest->rynok_pos === 3)
                                <div class="quest-item" crd_id={{$quest->id}}>
                                    <img src={{$quest->path_icon_img}} alt="Квест картинка" class="quest-thumbnail">
                                    <div class="quest-details">
                                        <h3>{{$quest->name}}</h3>
                                        <p>Цікава робота, деякі загадкові головоломки і багато чудес чекає на вас!</p>
                                        <button class="quest-button">Перейти до квесту</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- @for ($i = 0; $i < rand(7, 15); $i++)
                                <div class="quest-item">
                                    <img src="image/Без имени-3 1.png" alt="Квест картинка" class="quest-thumbnail">
                                    <div class="quest-details">
                                        <h3>Примарна вечірка</h3>
                                        <p>Цікава робота, деякі загадкові головоломки і багато чудес чекає на вас!</p>
                                        <button class="quest-button">Перейти до квесту</button>
                                    </div>
                                </div>
                        @endfor -->
                    </div>
                </div>
                <div class="character-display">
                    <img src={{asset("img/all_img/narrators/big/Тавернщик.png")}} alt="Персонаж"
                        class="character-image">
                </div>
            </div>


        </div>

    </div>
    <button class="carousel-control-prev custom-control" style="top: 150px; width: 36px; height: 39px;" type="button"
        data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">.</span>
    </button>
    <button class="carousel-control-next custom-control" style="top: 150px; width: 36px; height: 36px;" type="button"
        data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">.</span>
    </button>
</section>





<div class="tab-content fair">
    <p>Ярмарок контент</p>
</div>

@endsection


@section('html_card')
@include('card.card_item')
@include('card.card_quest')
@endsection