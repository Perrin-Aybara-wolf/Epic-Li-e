
// let progress = [0, 0, -1]; *
let text_study;
let narr_start;
let GL_i = 0;
let temp;
let blicks_interval = [];
let body = $('body')
let rozkazczik = $('<img class="rozkazczik" />'),
  svitok = $('<div class="svitok" />');
let text_narrators = $('<p></p>');
let btn_narrators = $('<button></button>');
let bloker = new Array(4);
let k_scroll = -30;
$(() => {
  study();

  $('.shtora').css({ display: 'flex' })
  setTimeout(() => {
    $('.shtora').css({ display: 'none' })
  }, 500)
  text_study = [
    [
      [
        {
          text: 'Вітаю, новий герой Еріс Lіфе!',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Я належу до спільноти найсильніших чаклунів цього всесвіту. Точніше, колись так було... Наші сили вже не ті, що були колись, і їх не вистачає для захисту всіх світів від Екзорцизму',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Ой, вибач, ти тільки прийшов, а мені заперечили жахати новачків або занудити. Але важко цього не робити, коли текст привітання писав бекендер, що тиждень не бачів сонця. Але що робити?',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Саме тому ми шукаємо сміливих героїв, котрі допомогли б нам захистити всі життя всіх всесвітів. Це велика відповідальность, з якою гідні набувають великої сили',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Але ти ще не готовий. Поки не готовий... Перш ніж займатися всесвітом інших, займись своїм власним',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Як всі герої початківці ти не справляєшся, ти ще слабкий, і, як і всім героям, тобі потрібно навчитися черпати сили зі знання ЩО робити та НЕМОЖЛИВОСТІ ЗАБУТИ про це',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Я навчу тебе одному заклинанню, завдяки якому ти ніколи не забудеш, що повинен зробити',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'До обновлення v2.6 тобі завжди потрібно знати чим займатися, а до v2.8 ще й час дя цього діла.\nПочнемо!',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'Це магічні поля завдань, давай пройдемося по ним детальніше...',
          top: 20,
          bottom: $(window).height() - $('.menu')?.height() - $('#Zad_1')[0]?.offsetLeft / 2 - 25,
          bottom: $(window).height() - $('.menu')?.height() - $('#Zad_1')[0]?.offsetLeft / 2 - 25,
          left: $('#Zad_1')[0]?.offsetLeft / 2,
          right: $('#Zad_1')[0]?.offsetLeft / 2,
          scroll: $('.menu')[0]?.offsetTop + k_scroll

        },
        {
          text: 'Це поле звичок. Звички виконуються щодня протягом усього дня',
          top: 20,
          bottom: $(window).height() - $('.menu')?.height() - $('#Zad_1')[0]?.offsetLeft / 2 - 25,
          left: $('#Zad_1')[0]?.offsetLeft / 2,
          right: $(window).width() - $('#Zad_2')[0]?.offsetLeft + ($('#Zad_2')[0]?.offsetLeft - $('#Zad_1')[0]?.offsetLeft - $('#Zad_1')?.width()) / 1.5,
        },
        {
          text: 'Це поле справ. Справи виконуються регулярно в призначений для цього час чи ні',
          top: 20,
          bottom: $(window).height() - $('.menu')?.height() - $('#Zad_1')[0]?.offsetLeft / 2 - 25,
          left: $('#Zad_2')[0]?.offsetLeft - ($('#Zad_2')[0]?.offsetLeft - $('#Zad_1')[0]?.offsetLeft - $('#Zad_1')?.width()) / 2,
          right: $(window).width() - $('#Zad_3')[0]?.offsetLeft + ($('#Zad_3')[0]?.offsetLeft - $('#Zad_2')[0]?.offsetLeft - $('#Zad_2')?.width()) / 1.5,

        },
        {
          text: 'Це поле завдань. Завдання виконуються один раз в призначений для цього час чи ні',
          top: 20,
          bottom: $(window).height() - $('.menu')?.height() - $('#Zad_1')[0]?.offsetLeft / 2 - 25,
          left: $(window).width() - $('#Zad_2')[0]?.offsetLeft + ($('#Zad_2')[0]?.offsetLeft - $('#Zad_1')[0]?.offsetLeft - $('#Zad_1')?.width()) / 1.5,
          right: $('#Zad_1')[0]?.offsetLeft / 2,

        },
        {
          text: 'Начаклуємо наше перше завдання',
          top: $('#Zad_2 .add_t')?.position()?.top - (k_scroll - 10),
          bottom: $(window).height() - $('#Zad_2 .add_t')?.position()?.top + (k_scroll - 10) - $('#Zad_2 .add_t')?.height() - parseInt($('#Zad_2 .add_t')?.css('margin-top')),
          left: $('#Zad_2')[0]?.offsetLeft - ($('#Zad_2')[0]?.offsetLeft - $('#Zad_1')[0]?.offsetLeft - $('#Zad_1')?.width()) / 2,
          right: $(window).width() - $('#Zad_3')[0]?.offsetLeft + ($('#Zad_3')[0]?.offsetLeft - $('#Zad_2')[0]?.offsetLeft - $('#Zad_2')?.width()) / 1.5,
          active_elements: $('#Zad_2 .add_t')

        },
        {
          text: 'Додайте назву та опис',
          top: $('.card_body #name')?.siblings('label')?.position()?.top,
          bottom: $(window).height() - $('.card_body #complexity')?.position()?.top,
          left: $('.card_body #name')?.offset()?.left - parseInt($('.card_body')?.css('padding-left')) / 2,
          right: $(window).width() - $('.card_body #name')?.offset()?.left - $('.card_body #name')?.width() - parseInt($('.card_body')?.css('padding-left')) / 2,
          active_elements: $('.card_body #name, .card_body #description')

        },
        {
          text: 'Чудово! Тепер призначте складність завданню (від цього буде залежати нагорода, але всьому свій час)',
          top: $('.card_body #complexity')?.siblings('label')?.position()?.top - 100,
          bottom: $(window).height() - $('.card_body .grid_grp')?.position()?.top + 100 - 10,
          left: $('.card_body #name')?.offset()?.left - parseInt($('.card_body')?.css('padding-left')) / 2,
          right: $(window).width() - $('.card_body #name')?.offset()?.left - $('.card_body #name')?.width() - parseInt($('.card_body')?.css('padding-left')) / 2,
          active_elements: $('.card_body #complexity'),
          scroll: 100,
          el_scroll: $('.shtora')

        },
        {
          text: 'Тепер встановимо час виконання. Не біда, якщо ти забудеш це зробити, ми зрозуміємо, що ти мав на увазі і самі підставимо час і дату. Але зараз в мене разнаряд',
          top: $('.card_body .grid_grp')?.first()?.position()?.top - 150,
          bottom: $(window).height() - $('.card_body #rep_int')?.position()?.top + 150 - 10,
          left: $('.card_body #name')?.offset()?.left - parseInt($('.card_body')?.css('padding-left')) / 2,
          right: $(window).width() - $('.card_body #name')?.offset()?.left - $('.card_body #name')?.width() - parseInt($('.card_body')?.css('padding-left')) / 2,
          active_elements: $('.card_body .grid_grp input'),
          scroll: 150,
          el_scroll: $('.shtora')

        },
        {
          text: 'Це лічильник повторення завдань. Завдання повториться через число обраного параметра',
          top: $('.card_body #rep_int')?.closest('div')?.siblings('label')?.position()?.top - 150,
          bottom: $(window).height() - $('.card_body #rep_cal')?.position()?.top + 150 - 10,
          left: $('.card_body #name')?.offset()?.left - parseInt($('.card_body')?.css('padding-left')) / 2,
          right: $(window).width() - $('.card_body #name')?.offset()?.left - $('.card_body #name')?.width() - parseInt($('.card_body')?.css('padding-left')) / 2,
          active_elements: $('.card_body #rep_int, .card_body .grid_grp+ #sel_rep_int'),
          scroll: 150,
          el_scroll: $('.shtora')

        },
        {
          text: 'Також є повторення по днях тижня, вибір категорії, кольору картки, але я пропоную тобі її зберегти',
          top: $('.card_body #rep_cal')?.siblings('label')?.position()?.top - 150,
          bottom: 15,
          left: $('.card_body #name')?.offset()?.left - parseInt($('.card_body')?.css('padding-left')) / 2,
          right: $(window).width() - $('.card_body #name')?.offset()?.left - $('.card_body #name')?.width() - parseInt($('.card_body')?.css('padding-left')) / 2,
          active_elements: $('.card_body input[type="submit"]'),
          scroll: 150,
          el_scroll: $('.shtora')

        },
        {
          text: "Вітаю! У тебе з'явилася перша нагадайка геройської справи",
          top: 20,
          bottom: $(window).height() - $('.menu')?.height() - $('#Zad_1')[0]?.offsetLeft / 2 - 25,
          left: $('#Zad_1')[0]?.offsetLeft / 2,
          right: $('#Zad_1')[0]?.offsetLeft / 2,
          scroll: $('.menu')[0]?.offsetTop + k_scroll

        },
        {
          text: 'Виконуючи їх одну за другою, твій світ буде очищатися від скверни Екзорциста, і буде тобі вдячний. Не віриш?',
          top: 0,
          bottom: $(window).height() - $('.navbar')[0]?.offsetHeight,
          left: $('.currency-icons')?.offset()?.left - 10,
          right: 0,
          scroll: 0

        },
        {
          text: "Так робити не можна, але у нас мало часу. Ці п'ятеро, бачте, дипломуються, тому давай уявимо, що це завдання вже виконано. Клікни сюди",
          top: $('#Zad_2 .add_t')?.offset()?.top + $('#Zad_2 .add_t')?.height() + parseInt($('.table_tsk')?.css('margin-top')) + 10,
          bottom: $(window).height() - $('#Zad_2 .add_t')?.offset()?.top - $('#Zad_2 .add_t')?.height() - parseInt($('.table_tsk')?.css('margin-top')) - 45,
          left: $('#Zad_2')?.offset()?.left + 20,
          right: $(window).width() - $('#Zad_2')?.offset()?.left - 55,
          // active_elements: $('.task input[type="checkbox"]').first(),
          scroll: 0

        },
        {
          text: 'Ось твої перші кровні',
          top: 0,
          bottom: $(window).height() - $('.navbar')[0]?.offsetHeight,
          left: $('.currency-icons')?.offset()?.left - 10,
          right: 0,
          scroll: 0

        },
        {
          text: 'Спойлер: таке використання магії створює додаткову скверну, здатну знищувати не тільки аватара героя, але і самого героя Особисто',
          top: 0,
          bottom: $(window).height() - $('.navbar')[0]?.offsetHeight,
          left: $('.currency-icons')?.offset()?.left - 10,
          right: 0,
          scroll: 0

        },
        {
          text: 'Була обіцянка не лякати і не занудити, але що мені можуть зробити? Видалять, в день дипломування? Ха!',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: "Це таємниця, про це ти не повинен був знати до того моменту, поки не було б піздно.\nЦе твій аватар в нашому світі, його зовнішній вигляд, показники здоров'я і сили духу",
          top: $('.navbar')[0]?.offsetHeight,
          bottom: $(window).height() - $('.navbar')[0]?.offsetHeight - $('.header-background')[0]?.offsetHeight,
          left: parseInt($('.header-background')?.css("padding-left")) / 2,
          right: $(window).width() - $('.profile-section')[0]?.offsetWidth - parseInt($('.header-background')?.css("padding-left"))
        },
        {
          text: "Кожного дня показник здоров'я аватара буде знижатися. Коли він дійде до 0 твій аватар помре і стане примарою. Якщо не витягнеш його з цього стану за 3 дні, його видалить з цього світу Екзорцист, разом з аккаунтом",
          top: $('.navbar')[0]?.offsetHeight,
          bottom: $(window).height() - $('.navbar')[0]?.offsetHeight - $('.header-background')[0]?.offsetHeight,
          left: parseInt($('.header-background')?.css("padding-left")) / 2,
          right: $(window).width() - $('.profile-section')[0]?.offsetWidth - parseInt($('.header-background')?.css("padding-left"))
        },
        {
          text: "Цього можна уникнути, споживаючи їжу та напої, які можна знайти у місцевий таверні",
          top: $('.navbar')[0]?.offsetHeight,
          bottom: $(window).height() - $('.navbar')[0]?.offsetHeight - $('.header-background')[0]?.offsetHeight,
          left: parseInt($('.header-background')?.css("padding-left")) / 2,
          right: $(window).width() - $('.profile-section')[0]?.offsetWidth - parseInt($('.header-background')?.css("padding-left"))
        },
        {
          text: 'v2.1 - епічні квести та випробування, де ти зможешь заробляти достатньо коштів не тільки на їжу, але й на зброю та преміум функцій. Як і померти під час зустрічі з курними хижими зайцями або Стародавнім драконом',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: '***',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        {
          text: 'За допомогою цієї панелі ти зможеш подорожувати по нашому світу Еріс Lіфе...',
          top: 0, bottom: $(window).height() - $('.navbar')[0]?.offsetHeight, left: 0, right: 0
        },
        {
          text: 'Мені холодно на тебе дивитися! Ходімо, я покажу тобі наш ринок. У тебе вже достатньо грошей хоча б на штані',
          top: 0,
          bottom: $(window).height() - $('.navbar')?.height() - 10,
          left: $('.nav-menu li:nth-child(3n)')?.first()?.offset()?.left - 10,
          right: $(window).width() - $('.nav-menu li:nth-child(3n)')?.first()?.offset()?.left - $('.nav-menu li:nth-child(3n)')?.first()?.width() - 10,
          active_elements: $('.nav-menu li:nth-child(3n)')?.first(),
        },
      ],
      [
        {
          text: 'О, вже прийшли! Так швидко, що аж зігрілися',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw'
        },
        // {
        //   text: 'Здесь ты можешь переключаться между Рынком, Квестами и Ярмарком',
        //   top: $('.tabs')?.offset()?.top,
        //   bottom: $(window).height() - $('.tabs')?.offset()?.top - $('.tabs')?.height(),
        //   left: 0,
        //   right: 0
        // },
        {
          text: 'Поки ти переводиш дух, пройдемося між прилавками (Перейди в режим "квести")',
          top: $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('.tabs')?.offset()?.top - $('.tabs')?.height(),
          left: 0,
          right: 0,
          active_elements: $('.tabs button:nth-child(2)')?.first(),
        },
        {
          text: 'В цьому режимі ти можешь говорити з продавцями та брати у них додаткові завдання за більш велику нагороду. А ще вони можуть зробити знижку, якщо ти виконуєш їх завдання доволі часто',
          top: $('.carousel-item.active img')?.offset()?.top - $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('footer')?.offset()?.top - $('.tabs')?.offset()?.top,
          left: 0,
          right: 0,
          scroll: $('.tabs')?.offset()?.top
        },
        {
          text: '*Звуки взріва*\nПривіт! Я Лея, місцева знахарка. На разі в мене готується нітрогліцерин, тому всі склянки з зіллями я перевізла до своєї матусі. Вертайся у обновленні v1.3, а зараз йди звідси',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw',
          scroll: $('.tabs')?.offset()?.top,
          narr: pathImg('narrators/big/Дiвчина_з_зiллям.png'),
        },
        {
          text: 'Пішли... ',
          top: $('.carousel-item.active img')?.offset()?.top - $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('.carousel-item.active img')?.offset()?.top - $('.carousel-item.active img')?.height() + $('.tabs')?.offset()?.top,
          left: 0,
          right: 0,
          scroll: $('.tabs')?.offset()?.top,
          active_elements: $('.carousel-control-prev span')?.first(),
          narr: narr_start,
        },
        {
          text: 'Я Деміан. Мені зараз не до тебе, але заходь якось до мене за зброєю та обладунками. Вони збережуть твоє життя, коли цей недочаклун ознайомить тебе з v2.1',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw',
          scroll: $('.tabs')?.offset()?.top,
          narr: pathImg('narrators/big/Кузнец.png'),
        },
        {
          text: 'Цей чаклун... Пф! Пішли звідси',
          top: $('.carousel-item.active img')?.offset()?.top - $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('.carousel-item.active img')?.offset()?.top - $('.carousel-item.active img')?.height() + $('.tabs')?.offset()?.top,
          left: 0,
          right: 0,
          scroll: $('.tabs')?.offset()?.top,
          active_elements: $('.carousel-control-prev span')?.first(),
          narr: narr_start,
        },
        {
          text: 'Хейо! Я Сет, а ти новенький герой? Я можу розповісти тобі що сталося зі старим!',
          top: '100vh', bottom: '100vh', left: '100vw', right: '100vw',
          scroll: $('.tabs')?.offset()?.top,
          narr: pathImg('narrators/big/Тавернщик.png'),
        },
        {
          text: 'Як небудь іншим разем!... \n*Швидко тягне тебе з таверни*',
          top: $('.carousel-item.active img')?.offset()?.top - $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('.carousel-item.active img')?.offset()?.top - $('.carousel-item.active img')?.height() + $('.tabs')?.offset()?.top,
          left: 0,
          right: 0,
          scroll: $('.tabs')?.offset()?.top,
          active_elements: $('.carousel-control-prev span')?.first(),
          narr: narr_start,
        },
        {
          text: 'Так, одежа... (Перейди в режим "Ринок")',
          top: $('.tabs')?.offset()?.top - $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('.tabs')?.offset()?.top - $('.tabs')?.height() + $('.tabs')?.offset()?.top,
          left: 0,
          right: 0,
          scroll: $('.tabs')?.offset()?.top,
          active_elements: $('.tabs button:nth-child(1)')?.first(),
        },
        {
          text: 'Яка сорочечка! І дешево!',
          top: $('.product-card[crd_id=24]')?.offset()?.top - $('.tabs')?.offset()?.top,
          bottom: $(window).height() - $('.product-card[crd_id=24]')?.offset()?.top - $('.product-card[crd_id=24]')?.height() + $('.tabs')?.offset()?.top,
          left: $('.product-card[crd_id=24]')?.offset()?.left,
          right: $(window).width() - $('.product-card[crd_id=24]')?.offset()?.left - $('.product-card[crd_id=24]')?.width(),
          scroll: $('.tabs')?.offset()?.top,
        },
        {
          text: 'Це вікно характеристик предмету, що ти купляєш. Ознайомся і...',
          top: '100px',
          bottom: '100px',
          left: '100px',
          right: '100px',
        },
        {
          text: 'Мене звуть важливі справи!!! Не хвилюйся, далі кожаний мішок бекендера доведе твоє навчання до кінця.\n Тел: 067 244 3808',
          top: '100px',
          bottom: '100px',
          left: '100px',
          right: '100px',
        },
      ],
    ],
    [
      [
        'jweofjweofjwe wefjwoefjowejf woejf0wejf0wejf woejfwejfowej j0efwj k0fjwe0fjwe',
        'Text 1.2',
        'Text 1.3',
      ],
      [
        'Text 2.1',
        'Text 2.2',
        'Text 2.3',
      ],
    ]
  ]

})


btn_narrators.on('click', (e) => {
  if (btn_narrators.css('opacity') !== 0) {
    changeText()
  }
})

function study() {
  $('body,html').animate({ scrollTop: 0 }, 100);
  body.css({ 'height': '100vh', 'overflow': 'hidden', });
  $('.shtora').css({ 'height': '100vh', 'overflow': 'hidden', });
  // console.log(document.body.scrollHeight)
  // window.scrollTo({ top: 400});
  for (let i = 0; i < 4; i++) {
    bloker[i] = document.createElement('div');
    // console.log(bloker[i])
    bloker[i].classList.add('bloker')
  }
  bloker[0].classList.add('top')
  bloker[1].classList.add('bottom')
  bloker[2].classList.add('left')
  bloker[3].classList.add('right')

  bloker.forEach((el) => {
    body.append(el);
  })

  svitok.css('background-image', `url(${pathImg('slurzba/свиток2.png')}`)
  btn_narrators.text('Далi')
  svitok.append(text_narrators)
  svitok.append(btn_narrators)
  rozkazczik.attr('src', pathImg('narrators/big/Narrator' + parseInt(Math.round(Math.random()) + 1) + '.png'))
  narr_start = rozkazczik.attr('src');
  body.append(rozkazczik);
  body.append(svitok);

  setTimeout(() => {

    if (progress[1] === 0) {
      setTimeout(() => {
        rozkazczik.animate({
          right: '-2vw',
        }, 500)
      }, 500);
    }
    else if (progress[1] === 1) {
      setTimeout(() => {
        rozkazczik.animate({
          left: '-2vw',
        }, 500)
      }, 500);
    }

    setTimeout(() => {
      if (progress[1] === 0) {
        svitok.animate({
          // right: '30vw',
          right: rozkazczik.css('width').slice(0, -2) - 115 + 'px',
          bottom: rozkazczik.css('height').slice(0, -2) / 3 + 'px',
        }, 500)
      }
      else if (progress[1] === 1) {
        svitok.animate({
          // right: '30vw',
          left: rozkazczik.css('width').slice(0, -2) - 115 + 'px',
          bottom: rozkazczik.css('height').slice(0, -2) / 3 + 'px',
        }, 500)
      }

      setTimeout(() => {
        svitok.animate({
          height: '280px',
          width: '455px',
        }, 500)

        setTimeout(() => {
          changeText();
          text_narrators.animate({
            opacity: 1,
          }, 500)
          setTimeout(() => {
            btn_narrators.animate({
              opacity: 1,
            }, 500)
          }, 500)
        }, 500)
      }, 1000)

    }, 1000)


  }, 100);
}



function changeText(back = false) {
  // console.log('shtora scrl: ' + $('.shtora').scrollTop())
  // console.log(progress[2] + " : " + text_study[0][0].length)
  console.log("narr: "+narr_start)
  progress[2]++;
  // if (!back)
  //   progress[2]++;
  // else
  //   progress[2]--;


  if (text_study[progress[0]][progress[1]][progress[2]]?.narr) {
    rozkazczik.animate({
      opacity: 0,
    }, 300)
    setTimeout(() => {
      rozkazczik.attr('src', text_study[progress[0]][progress[1]][progress[2]].narr)
      rozkazczik.animate({
        opacity: 1,
      }, 300)
    }, 300)
  }

console.log(text_study[progress[0]][progress[1]].length + ":" + progress[2])
  if (text_study[progress[0]][progress[1]].length === progress[2]) {
    btn_narrators.animate({
      opacity: 0,
    }, 500)
    setTimeout(() => {

      svitok.animate({
        right: '-100vw',
        opacity: 0,
      }, 500)

      setTimeout(() => {
        rozkazczik.animate({
          right: '-100vw',
          opacity: 0,
        }, 500)
      svitok.remove();
      setTimeout(() => {
        rozkazczik.remove();
      },500)
      }, 80);

      // move_bloker(top, bottom, left, right)
      move_bloker()

      body.css({ 'overflow': 'unset', })
    }, 1000)

    return
  }

  if (!text_study[progress[0]][progress[1]][progress[2]].active_elements) {
    btn_narrators.animate({
      opacity: 1
    }, 100)
    setTimeout(() => { btn_narrators.css({ display: 'block' }) }, 100)
    btn_narrators.attr('disabled', false)
  }
  else {
    btn_narrators.animate({
      opacity: 0
    }, 100)
    setTimeout(() => { btn_narrators.css({ display: 'none' }) }, 100)
    btn_narrators.attr('disabled', true)
  }
  //Счётчик прогресса === обновление progress = [0,0,0]
  // alert('fdfdfdfdfd')
  text_narrators.animate({
    opacity: 0,
  }, 200)

  setTimeout(() => {
    text_narrators.text(text_study[progress[0]][progress[1]][progress[2]].text)
    text_narrators.animate({
      opacity: 1,
    }, 500)
  }, 300)


  console.log(progress)

  console.log(text_study[progress[0]][progress[1]][progress[2]].scroll)
  if (!isNaN(text_study[progress[0]][progress[1]][progress[2]].scroll)) {
    if (text_study[progress[0]][progress[1]][progress[2]].el_scroll) {
      $(text_study[progress[0]][progress[1]][progress[2]].el_scroll).animate({ scrollTop: text_study[progress[0]][progress[1]][progress[2]].scroll }, 1000);
      // text_study[progress[0]][progress[1]][progress[2] + 1].top -= text_study[progress[0]][progress[1]][progress[2]].scroll;
      // text_study[progress[0]][progress[1]][progress[2] + 1].button += text_study[progress[0]][progress[1]][progress[2]].scroll;
      // console.log(text_study[progress[0]][progress[1]][progress[2] + 1])
      // console.log(text_study[progress[0]][progress[1]][progress[2]].scroll)
    } else
      $('body,html').animate({ scrollTop: text_study[progress[0]][progress[1]][progress[2]].scroll }, 1000);
    console.log(text_study[progress[0]][progress[1]][progress[2]].scroll)
    console.log(text_study[progress[0]][progress[1]][progress[2]].scroll)
  }
  if (text_study[progress[0]][progress[1]][progress[2]].active_elements) {
    // text_study[progress[0]][progress[1]][2].left = $('.card_body #name').offset().left;

    console.log('set bottom: ' + text_study[progress[0]][progress[1]][progress[2]].bottom)


    // console.log('left: ' + $('.card_body #name').offset().left)
    // console.log('top: ' + $('.card_body #name').position().top)
    // console.log('width: ' + $('.card_body #name').width())
    // console.log('height: ' + $('.card_body #name').height())
    let active_elements = text_study[progress[0]][progress[1]][progress[2]].active_elements;
    let itter = [];
    active_elements.each((index, el) => {
      el = $(el);

      if (el.attr('type') === 'text' || el.prop("tagName") === 'TEXTAREA') {
        el.on('input', (e) => {
          clearInterval(blicks_interval[index])
          if (el.val().length > 5) {
            console.log(el.val().length > 0)
            if (!itter.includes(el))
              itter.push(el);
            if (itter.length === active_elements.length)
              changeText();
            el.off('input');
          }
          else itter = itter.filter((element) => element !== el);
        })
      }


      else if ((el.prop("tagName") === 'INPUT' && el.attr('type') !== 'submit') || el.prop("tagName") === 'SELECT') {
        el.on('change', () => {
          console.log(el.prop("tagName"))
          clearInterval(blicks_interval[index])
          if (!itter.includes(el))
            itter.push(el);
          if (itter.length === active_elements.length)
            changeText();
          el.off('change');
        })

      }
      else if (el.prop("tagName") === 'INPUT' && el.attr('type') === 'submit') {
        el.on('click', () => {
          clearInterval(blicks_interval[index])
          changeText();
        })

      }

      else {
        console.log(GL_i)
        el.on('click', kill_event(() => {
          clearInterval(blicks_interval[index])
          changeText();
        }))

      }


      let color = el.css('background-color');
      blicks_interval[index] = setInterval(() => {
        // console.log(active_elements, color)
        el.animate({
          backgroundColor: 'red',
          opacity: 1,
        }, 300);
        setTimeout(() => {
          el.animate({
            backgroundColor: color,
          }, 500);
        }, 300)
      }, 1000)
    })


  }

  setTimeout(() => {
    console.log('fff')
    move_bloker(
      text_study[progress[0]][progress[1]][progress[2]].top,
      text_study[progress[0]][progress[1]][progress[2]].bottom,
      text_study[progress[0]][progress[1]][progress[2]].left,
      text_study[progress[0]][progress[1]][progress[2]].right
    )

  }, text_study[progress[0]][progress[1]][progress[2]].timeout ? text_study[progress[0]][progress[1]][progress[2]].timeout : 0)
}




function move_bloker(top = 0, bottom = 0, left = 0, right = 0) {
  // console.log(left)
  setTimeout(() => {
    $(bloker[0]).animate({
      height: isNaN(top) ? top : top + 'px',
    }, 300)
    $(bloker[1]).animate({
      height: isNaN(bottom) ? bottom : bottom + 'px',

    }, 300)
    $(bloker[2]).animate({
      width: isNaN(left) ? left : left + 'px',

    }, 300)
    $(bloker[3]).animate({
      width: isNaN(right) ? right : right + 'px',

    }, 300)
  }, 500);

}
const kill_event = (fn) => (...args) => {
  if (GL_i === 0) {
    GL_i++;
    return fn(...args);
  }
  GL_i = 0;
  return;

}
// {
//   text: 'Но одеть твоего аватара всё же стоит... Давай будем считать, что ты выполнил своё первое задание. Жмакни вот сюда',
//   top: $('#Zad_2 input[type="checkbox"]').offset().top - 10,
//   bottom: $(window).height() - $('.card input[type="checkbox"]').offset().top - $('.card input[type="checkbox"]').height() - 10,
//   left: $('.card input[type="checkbox"]').offset().left - 10,
//   right: $(window).width() - $('.card input[type="checkbox"]').offset().left - $('.card input[type="checkbox"]').width() - 10,
//   active_elements: $('.card input[type="checkbox"]'),
//   scroll: 0

// },




// {
//   text: 'Поки ти переводиш дух, пройдемося між прилавками (Перейди в режим "квести")',
//   top: $('.carousel-item.active img')?.offset()?.top,
//   bottom: $(window).height() - $('.carousel-item.active img')?.offset()?.top - $('.carousel-item.active img')?.height(),
//   left: 0,
//   right: 0,
//   active_elements: $('.tabs button:nth-child(2)')?.first(),
// },