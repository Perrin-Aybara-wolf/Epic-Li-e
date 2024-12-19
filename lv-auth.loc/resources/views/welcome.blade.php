<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Underdog&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <!-- vite(['resources/sass/app.scss']) -->
</head>

<body class="flex-cntr">
    <header style="background-image: url('{{asset('img/all_img/wlcm_header.png')}}')">
        <nav>
            <ul class="flex-cntr" style="justify-content: space-around">
                <li class="logo"><a href="#"><img src="img/welcome/Group 330.png" alt="Logo"></a></li>
                <li class="cta-buttons flex-cntr">
                    <a href="#start" class="start cta-button" data-uk="Почати" data-en="Start">Почати</a>
                    <a href="#mobile" class="mobile-app cta-button" data-uk="Мобільний додаток"
                        data-en="Mobile App">{{__('Mobile App')}}</a>
                    <a href="#other" class="other cta-button" data-uk="Інше" data-en="Other">Інше</a>
                </li>
                <li class="login-lang flex-cntr">
                    <a href="{{route('login')}}" class="cta-button login" data-uk="Ввійти" data-en="Login">Ввійти</a>

                    <div class="language-switcher">
                        <a href="ua" id="uk-lang" class="lang active">UA</a>
                        <span class="separator">|</span>
                        <a href="en" id="en-lang" class="lang">EN</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero flex-cntr">
            <div class="hero-content flex-cntr">
                <div class="left-content flex-cntr">
                    <div class="characters flex-cntr">
                        <div class="character-wrapper">
                            <img src="img/welcome/Розказчик 32 коп2.png" alt="Character 1" class="character">
                            <img src="img/welcome/Без 21 4.png" alt="Additional Character 1" class="additional-photo">
                        </div>
                        <div class="character-wrapper">
                            <img src="img/welcome/Розказчиця 32 коп.png" alt="Character 2" class="character lower">
                            <img src="img/welcome/Без 21 4.png" alt="Additional Character 2" class="additional-photo">
                        </div>
                        <div class="character-wrapper">
                            <img src="img/welcome/Розказчик 32 коп.png" alt="Character 3" class="character">
                            <img src="img/welcome/Без 21 4.png" alt="Additional Character 3" class="additional-photo">
                        </div>
                    </div>
                    <div class="stats" data-uk="Користувачі" data-en="Users">Користувачі</div>
                    <div class="count-bar flex-cntr">
                        <div class="digit flex-cntr">
                        </div>
                        <div class="digit flex-cntr">
                        </div>
                        <div class="digit flex-cntr">
                        </div>
                        <div class="digit flex-cntr">
                        </div>
                        <div class="digit flex-cntr">
                        </div>
                        <div class="digit flex-cntr">
                        </div>
                    </div>
                    <div class="motto" data-uk="Мотивуйте себе та досягайте свої цілі"
                        data-en="Motivate yourself and achieve your goals">
                        Мотивуйте себе та досягайте свої цілі
                    </div>
                    <h3 class="main-title" data-uk="Час повеселитися, досягаючи своїх цілей!"
                        data-en="Get inspired, achieve your goals!">
                        Час повеселитися, досягаючи своїх цілей!
                    </h3>
                    <div class="description"
                        data-uk="Час повеселитися, досягаючи своїх цілей! Приєднуйся до інших жителів Epic Liфе та покращуй своє життя, виконуючи завдання одне за одним"
                        data-en="Get inspired, achieve your goals! Join over 4 million Habitica players and improve your life by completing tasks one by one.">
                        Час повеселитися, досягаючи своїх цілей! Приєднуйся до інших жителів Epic Liфе та покращуй своє
                        життя, виконуючи завдання одне за одним
                    </div>
                </div>
                <form class="registration-form" action="{{route('user.store')}}" method="post">
                    @csrf
                    <h2>Безкоштовна реєстрація</h2>
                    <p>Ім'я користувача має бути завдовжки від 1 до 20 символів, містити літери від a до z, цифри від 0
                        до 9, дефіс або підкреслення і не може містити заборонені слова.</p>
                    <input type="text" name="name" placeholder="Ім'я користувача">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Пароль">
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Підтвердьте пароль">
                    <p>Ім'я користувача має бути завдовжки від 1 до 20 символів, містити літери від a до z, цифри від 0
                        до 9, дефіс або підкреслення і не може містити заборонені слова.</p>
                    <button type="submit">Зареєструватись</button>
                    <div class="social-icons flex-cntr" style="align-self:center; width: 100%; gap: calc(var(--k)/10)">
                        <img src="img/welcome/Group 255.png" alt="Google">
                        <img src="img/welcome/Facebook_Logo_(2019) 1.png" alt="Facebook">
                        <img src="img/welcome/Group 256.png" alt="Apple">
                    </div>
                </form>
            </div>
        </section>
        <section class="features">
            <img src={{asset('img/all_img/wlcm_header.png')}} alt="Top image"
                style="position: relative; bottom: calc(var(--k)*0.78);">
            <div style="text-align: center; display: flex; justify-content: center;z-index: 2;background: #1B3841;">
                <div class="flex-cntr"
                    style="width: calc(var(--k)*6.25); text-align: center; flex-direction: column; font-size: calc(var(--k)*0.24);">
                    <h2 id="start">Живи граючись</h2>
                    Epic Life - безкоштовний застосунок для вироблення звичок
                    і підвищення особистої ефективності,
                    який перетворює ваше життя на гру. Граючи нагороди та покарання мотивують, а сильна соціальна
                    складова нагадує - завдяки цьому Epic Life допоможе вам стати здоровішими, працьовитішими і
                    щасливішими.
                </div>
            </div>
            <div class="goals">
                <div class="goal-image">
                    <img src="img/welcome/Group 407.png" alt="Goal 1">
                </div>
                <div class="goal-image">
                    <img src="img/welcome/Group 266.png" alt="Goal 2">
                </div>
                <div class="goal-image">
                    <img src="img/welcome/Group 316.png" alt="Goal 3">
                </div>
                <h3 class="goal-title" data-uk="Досягайте своїх цілей" data-en="Achieve your goals">Досягайте своїх
                    цілей</h3>
                <h3 class="goal-title" data-uk="Отримуйте нагороди за досягнення цілей"
                    data-en="Earn rewards for achieving goals">
                    Отримуйте нагороди за досягнення цілей</h3>
                <h3 class="goal-title" data-uk="Перемагайте монстрів із друзями" data-en="Defeat monsters with friends">
                    Перемагайте монстрів із друзями</h3>
                <p class="goal-text">Будьте відповідальними, виставляючи і керуючи своїми завданнями. Щоб підвищити
                    мотивацію,
                    відстежуйте свою продуктивність за допомогою мобільного додатку і застосунку Epic Life,
                    за що отримайте винагороду.</p>
                <p class="goal-text">Відзначайте завдання, щоб отримувати рівень, перетворюйте своїх персонажів у
                    потужних
                    бойових товаришів, отримуйте обладунки, навички, і навіть квести!</p>
                <p class="goal-text">Боріться з монстрами разом з іншими користувачами Habitica! Використовуйте
                    золото, щоб
                    купувати внутрішньоігрові нагороди, або саморобні, такі, як перегляд епізоду улюбленого
                    ТВ-шоу.</p>
            </div>
            <img src={{asset('img/all_img/wlcm_bottom.png')}} alt="Bottom image"
                style="position: relative; bottom: calc(var(--k)*-0.84);">
        </section>
        <section class="usage">
            <h2 class="usage-header" data-uk="Гравці використовують Epic Liфе, щоб поліпшити"
                data-en="How do you use Epic Life?">
                Гравці використовують Epic Liфе, щоб поліпшити
            </h2>
            <!-- <p>Дізнайтеся, як Epic Life допоможе вам досягти успіху в різних сферах вашого життя!</p> -->

            <div class="usage-cards">
                <img src="img/welcome/Картинка 3.png" alt="Usage 1">
                <h3 data-uk="Здоров'я та фізичну форму" data-en="Daily Goals">Здоров'я та фізичну форму</h3>
                <p>Ніколи не вистачало мотивації, щоб чистити зуби? Не виходило вибратися в спортзал? Epic Liфе
                    дасть змогу, нарешті, поєднати здорові звички та задоволення.</p>
                <img src="img/welcome/Картинка 2.png" alt="Usage 2">
                <h3 data-uk="Підготовку до школи і для роботи" data-en="Productivity">Підготовку до школи і для
                    роботи</h3>
                <p>Готуєте ви звіт для вашого вчителя або начальника, за прогресом виконання ваших найскладніших
                    завдань легко стежити.</p>
                <img src="img/welcome/Картинка 1.png" alt="Usage 3">
                <h3 data-uk="І багато, багато іншого!" data-en="Habit Development">І багато, багато іншого!</h3>
                <p>Наш повністю настроюваний список завдань означає, що ви можете сформувати Habitica відповідно
                    до
                    ваших особистих цілей. Працювати над творчими проектами, дотримуватися піклування про себе,
                    або
                    здійснювати іншу мрію - все залежить від вас.</p>
            </div>
        </section>

        <h2 id="mobile">Завантажуй додаток Epic Liфe</h2>
        <div class="download flex-cntr">
            <div class="image-content">
                <img src="img/welcome/Group 433.png" alt="Image description">
            </div>
            <div class="download-content">
                <p>Підвищуйте свій рівень у будь-якому місці</p>
                <p>Наші мобільні додатки спрощують відстеження ваших завдань на ходу. Виконуйте свої цілі одним
                    натисканням, незалежно від того, де ви перебуваєте.</p>
                <div class="store-buttons">
                    <a href="google_play_link" target="_blank">
                        <img src="img/welcome/google-play-badge-logo-png-transparent 1.png" alt="Google Play Store">
                    </a>
                    <a href="apple_store_link" target="_blank">
                        <img src="img/welcome/iconstoreapple 1.png" alt="Apple App Store">
                    </a>
                </div>
            </div>
        </div>
        <div class="join-epic-life flex-cntr">
            <p>Приєднуйтесь до Epic Liфe, проводьте час весело та з користю і досягайте своїх цілей!</p>
            <a href="#" class="join-button flex-cntr">
                <p>Приєднатись до Epic Liфe</p>
            </a>
        </div>
    </main>
    @include('layouts.footer')
    <div style="background-image: url('img/log_reg/fon.png'); width: 100%; height: calc(var(--k)*4.3);">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(() => {
            const totalDigits = 10;
            let str = '{{$count}}';
            console.log(str)
            const finalNumbers = [str[0], str[1], str[2], str[3], str[4], str[5]];
            const randomNumbers = [];

            for (let i = 0; i < finalNumbers.length; i++) {
                let numbers = [];
                for (let j = 0; j < totalDigits; j++) {
                    numbers.push(Math.floor(Math.random() * 10));
                }
                randomNumbers.push(numbers);
            }

            function animateDigit($digitElement, targetNumber, numbers, delay) {
                let currentIndex = 0;

                function rotateNumbers() {
                    if (currentIndex < numbers.length) {
                        let newNumber = numbers[currentIndex];

                        let $newNumber = $('<div class="number">' + newNumber + '</div>').css('top', '-100%');
                        $digitElement.append($newNumber);

                        setTimeout(function () {
                            $newNumber.css('top', '100%');
                        }, 20);

                        if ($digitElement.children().length > 2) {
                            $digitElement.children().first().remove();
                        }

                        currentIndex++;

                        if (currentIndex === numbers.length) {
                            setTimeout(function () {
                                let $finalNumber = $('<div class="number">' + targetNumber + '</div>').css('top', '-100%');
                                $digitElement.append($finalNumber);
                                setTimeout(function () {
                                    $finalNumber.css('top', '-5px');
                                }, 20);
                            }, 300);
                        }
                    }
                }

                setTimeout(function () {
                    let interval = setInterval(rotateNumbers, 300);
                    setTimeout(function () {
                        clearInterval(interval);
                    }, numbers.length * 300);
                }, delay);
            }

            $('.digit').each(function (index) {
                let targetNumber = finalNumbers[index];
                let delay = index * 100;
                animateDigit($(this), targetNumber, randomNumbers[index], delay);
            });
        });

    </script>
</body>

</html>