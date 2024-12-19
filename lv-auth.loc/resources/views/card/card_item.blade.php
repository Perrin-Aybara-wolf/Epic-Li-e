<div class="item-card">
    <div class="close-button">✕</div>
    <div class="item-container">
        <img src={{asset("img/all_img/items/Чувак.png")}} alt="Character" class="character-it">
        <img src={{asset("img/all_img/items/Очі.png")}} alt="Очі" class="character-it">
        <img src="" onerror="this.onerror = null;this.src='{{asset('img/all_img/items/Зачіска.png')}}';" alt="Hat"
            id="head" class="ite">
        <img src="" onerror="this.onerror = null;this.src='{{asset('img/all_img/items/Бард/Сорочка.png')}}';" id="body" alt="Hat"
            class="ite">
        <img src="" onerror="this.onerror = null;this.src='{{asset('img/all_img/items/Skins_pos/Варвар/1/Меч.png')}}'" alt="Sword"
            id="r_arm" class="ite">
        <img src="" onerror="this.onerror = null;this.src=''" alt="Shield" id="l_arm" class="ite">
        <img src="" onerror="this.onerror = null;this.src='{{asset('img/all_img/items/Бард/Взуття.png')}}'" alt="Boots" id="foots" class="ite">
        <img src="" onerror="this.onerror = null;this.src='{{asset('img/all_img/items/Бард/Штані.png')}}'" alt="Pants"
            id="legs" class="ite">
    </div>
    <h1 class="name"></h1>
    <p class="description"></p>

    <h3 class="item-benefits-title">Що надає цей предмет?</h3>
    <div class="stats">
        <div class="stat-block">
            <div>СИЛ: <span class="str">0</span></div>
            <div>Обладунки: <span class="str_atak">0</span></div>
            <div>Зброя: <span class="str_armor">0</span></div>
        </div>
        <div class="stat-block">
            <div>ІНТ: <span class="intel">0</span></div>
            <div>Обладунки: <span class="intel_atak">0</span></div>
            <div>Зброя: <span class="intel_armor">0</span></div>
        </div>
        <div class="stat-block">
            <div>ВИТ: <span class="dex">0</span></div>
            <div>Обладунки: <span class="dex_atak">0</span></div>
            <div>Зброя: <span class="dex_armor">0</span></div>
        </div>
        <div class="stat-block">
            <div>СПР: <span class="tilo">0</span></div>
            <div>Обладунки: <span class="tilo_atak">0</span></div>
            <div>Зброя: <span class="tilo_armor">0</span></div>
        </div>
    </div>


    <div class="price-section">
        <span>Ціна:</span>
        <span class="price coin">0</span>
        <img class="coin" id="it_gm" src="{{asset('img/all_img/icons/gold.png')}}" alt="Coin" class="coin-icon">
        <span class="price kristal">0</span>
        <img class="kristal" id="it_dm" src="{{asset('img/image/kristal.png')}}" alt="kristal" class="kristal-icon">
    </div>
    <button class="buy-button">Придбати зараз</button>
    <div class="footer_crd">
        <span class="savings-text">Ваші заощадження:</span>
        <div class="savings">
            <img src="{{asset('img/all_img/icons/gold.png')}}" alt="Coin" class="currency-icon">
            <span id="user_gm">{{auth()->user()->GM}}</span>
            <img src="{{asset('img/image/kristal.png')}}" alt="Diamond" class="currency-icon">
            <span id="user_dm">{{auth()->user()->DM}}</span>
        </div>
    </div>
</div>