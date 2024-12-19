let user_close_img = {
  // head: 0,
  // body: 0,
  // legs: 0,
  // foots: 0,
  // r_arm: 0,
  // l_arm: 0,
};
let room = $('.character-room');
clouds(true);
let lvl_studing;

$(() => {
  $('body,html').animate({scrollTop: 0}, 1000);

  // console.log(screen.height)
  // let coulds = $('.cloud');
  // for (let i = 0; i < coulds.length; i += 2) {
  //   coulds[i].style.top = coulds[i + 1].style.top = 100 * (coulds.length / 2 - i) + 'px'

  //   // coulds[i].style.left = Math.random() * 50 * (Math.random() ? 1 : -1) + 'px';
  //   // coulds[i + 1].style.right = Math.random() * 50 * (Math.random() ? 1 : -1) + 'px';

  //   let stopPosition = Math.random() * 90 + 10 + 'vw';

  //   for (let j = 0; j < 2; j++) {
  //     let cloud = $(coulds[i - j]);
  //     if (j === 0) {
  //       // cloud.css({
  //       //   left: '-50vw', // Початкова позиція лівої хмари
  //       //   // top: verticalPosition // Встановлюємо вертикальну позицію
  //       // });
  //       cloud.animate({ left: stopPosition }, 3000); // Анімація
  //     } else {
  //       cloud.addClass('right-cloud');
  //       cloud.css({
  //         right: '-50vw', // Початкова позиція правої хмари
  //         top: verticalPosition // Встановлюємо вертикальну позицію
  //       });
  //       cloud.animate({ right: stopPosition }, 3000); // Анімація
  //     }

  //     $('#cloud-container').append(cloud);
  //   }

  // }

  $('a').on('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    clouds();
    console.log(lvl_studing)
    if(lvl_studing === 0){
      
      alert('dsdsds')
      upLvl();
    }

    let link = getCard(e.target, 'a')
    link.attr('target', link.attr('target') ? link.attr('target') : '_self')
    console.log(link[0].target)
    setTimeout(() => window.open(link[0].href, link[0].target), 2000)
  })

  $('.character-room').on('click', (e) => {
    // room[0].classList.add('room-inventory');
    // setTimeout(()=>{
    //   room[0].classList.remove('room-inventory')
    //   room.css({'width': '500px', 'height': '500px'})
    //   console.log($('.shtora .right_zone')[0])
    //   $('.shtora .right_zone')[0].prepend(room[0]);


    // }, 1000)
  })






  let wear_close_img = $('.character-room *:not(:first-child)');

  wear_close_img.each((index, el) => {
    switch (el.getAttribute('id')) {
      case 'head':
        user_close_img.head = el.getAttribute('crd_id');
        break;
      case 'body':
        user_close_img.body = el.getAttribute('crd_id');
        break;
      case 'legs':
        user_close_img.legs = el.getAttribute('crd_id');
        break;
      case 'foots':
        user_close_img.foots = el.getAttribute('crd_id');
        break;
      case 'l_arm':
        user_close_img.l_arm = el.getAttribute('crd_id');
        break;
      case 'r_arm':
        user_close_img.r_arm = el.getAttribute('crd_id');
        break;
    }
  })

  $(document).on('click', '.add_t, .card', (e) => {
    e.stopPropagation();
    // alert('click')
    $('.shtora').first().css('display', 'flex');
    $('.card_body').first().css('display', 'block');
  })

  $('.accordion-button').on('click', '*', () => {
    $('.menu-container').slideToggle();

  })

  $('.inv-box').on('click', '*', (e) => {
    // console.log('inv-box')

    let room = $('.character-room');
    room[0].classList.add('room-inventory');
    setTimeout(() => {
      room[0].classList.remove('room-inventory')
      room.css({ 'width': '500px', 'height': '500px' })
      console.log($('.shtora .right_zone')[0])
      $('.shtora .right_zone')[0].prepend(room[0]);


      $('.shtora').css('display', 'flex');
      $('.inventory_desk').css({ 'display': 'block', });
    }, 1000)

    e.preventDefault();
    $('.item-card').css({ 'display': 'none', });
    $('.task-card').css({ 'display': 'none', });
    $('.card_body').css({ 'display': 'none', });

    let items = $('.inventory_desk .item');
    console.log(items.attr('crd_id'))
    items.each((index, el) => {
      el = $(el);
      if (Object.values(user_close_img).includes(el.attr('crd_id'))) {
        el.find('.border_itm').attr('src', border_gold)
        el.find('.border_itm')[0].classList.add('active')
      }
    })


    $('.carousel-wrapper').find('.grid-row').each((index, el_grid) => {
      el_grid = $(el_grid)
      if (el_grid.find('.item').length > 4 && el_grid.siblings('.carousel-btn').length < 2) {
        el_grid.css('padding-left', 0)
        el_grid.before(`<button class="carousel-btn left" onclick="scrllLeft(${el_grid.attr('id').slice(-1)})">←</button>`)
        el_grid.after(`<button class="carousel-btn right" onclick="scrllRight(${el_grid.attr('id').slice(-1)})">→</button>`)
      }
    })
  })
  $('.close-button').on('click', (e) => {
    console.log('close-button')

    e.preventDefault();
    $('.shtora').css('display', 'none');
    $('.item-card').css({ 'display': 'none', });
    $('.task-card').css({ 'display': 'none', });
    $('.card_body').css({ 'display': 'none', });
    $('.inventory_desk').css({ 'display': 'none', });
  })
  $('.shtora').on('mousedown', (e) => {
    e.stopPropagation();
    if ($(e.target)[0] !== $('.shtora')[0]) {
      return
    };
    $('.shtora').css({ 'display': 'none', 'z-index': 10, });
    $('.item-card').css({ 'display': 'none', 'z-index': -1, });
    $('.task-card').css({ 'display': 'none', 'z-index': -1, });
    // $('.card_body').css({ 'display': 'none', 'z-index': -1, });


    if ($('.inventory_desk').css('display') !== 'none') {
      $('.inventory_desk').css({ 'display': 'none', });


      room[0].classList.add('room-inventory');
      $('body').append(room[0])
      setTimeout(() => {
        room[0].classList.remove('room-inventory')
        room.css({ 'width': '160px', 'height': '160px' })
        $('.profile-section')[0].prepend(room[0]);


        // $('.shtora').css('display', 'flex');
        // $('.inventory_desk').css({ 'display': 'block', });
      }, 1000)

    }
  })

  $('.shtora').on('mousedown', 'button, .character-room', (e) => {
    e.stopPropagation();
  });
  $('.shtora').on('mousedown', '.item', (e) => {
    e.stopPropagation();
    let card = getCard(e.target, '.item')


    if (card.closest('#row0').length > 0) {
      let img_box = $('.character-room #head');
      console.log(img_box)
      if (img_box.length === 0) {
        img_box = document.createElement('img');
        img_box.setAttribute('id', 'head');
        $('.character-room')[0].append(img_box);
      }
      $('#head').attr('src', card.find('img').first().attr('wear'));
      user_close_img.head = card.attr('crd_id');
    }
    else if (card.closest('#row1').length > 0) {
      let img_box = $('.character-room #body');
      if (img_box.length === 0) {
        img_box = document.createElement('img');
        img_box.setAttribute('id', 'body');
        $('.character-room')[0].append(img_box);
      }
      $('#body').attr('src', card.find('img').first().attr('wear'));
      user_close_img.body = card.attr('crd_id');
    }
    else if (card.closest('#row2').length > 0) {
      let img_box = $('.character-room #legs');
      if (img_box.length === 0) {
        img_box = document.createElement('img');
        img_box.setAttribute('id', 'legs');
        $('.character-room')[0].append(img_box);
      }
      $('#legs').attr('src', card.find('img').first().attr('wear'));
      user_close_img.legs = card.attr('crd_id');
    }
    else if (card.closest('#row3').length > 0) {
      let img_box = $('.character-room #foots');
      if (img_box.length === 0) {
        img_box = document.createElement('img');
        img_box.setAttribute('id', 'foots');
        $('.character-room')[0].append(img_box);
      }
      $('#foots').attr('src', card.find('img').first().attr('wear'));
      user_close_img.foots = card.attr('crd_id');
    }
    else if (card.closest('#row4').length > 0) {
      let img_box = $('.character-room #r_arm');
      if (img_box.length === 0) {
        img_box = document.createElement('img');
        img_box.setAttribute('id', 'r_arm');
        $('.character-room')[0].append(img_box);
      }
      $('#r_arm').attr('src', card.find('img').first().attr('wear'));
      user_close_img.r_arm = card.attr('crd_id');
      card.find('img').last().attr('src',)
    }
    else if (card.closest('#row5').length > 0) {
      let img_box = $('.character-room #l_arm');
      if (img_box.length === 0) {
        img_box = document.createElement('img');
        img_box.setAttribute('id', 'l_arm');
        $('.character-room')[0].append(img_box);
      }
      $('#l_arm').attr('src', card.find('img').first().attr('wear'));
      user_close_img.l_arm = card.attr('crd_id');
    }
  })
  $("input[type='submit']").on('click', (e) => {
      e.preventDefault();
      // data_ =upFormData(data_.get('column'));
      if (e.target.value === "Редагувати") updateTask(upFormData(data_.get('column')));
      else if (e.target.value === "Додати") addTask(upFormData(data_.get('column')));
      // clearForm();
  })

});





function scrllLeft(rowIndex) {
  const row = document.getElementById(`row${rowIndex}`);
  if (row.scrollLeft > 0) {
    row.scrollBy({
      left: -(143 * 1),
      behavior: 'smooth'
    });
  }
}

function scrllRight(rowIndex) {
  const row = document.getElementById(`row${rowIndex}`);
  row.scrollBy({
    left: 143 * 1,
    behavior: 'smooth'
  });
}

function getCard(obj, cls_id) {
  if ($(obj).closest(cls_id).length > 0)
    return $(obj).closest(cls_id);
  else return false;
}

function closeReset(body_name = false) {

  if (!body_name) {
    user_close_img = {};
    $('.inventory .active').attr('src', border_aurum);
    // $('.character-room *:not(:first-child)').remove();
    $('.character-room img:nth-child(n+5)').remove();
    // $('.character-room img:nth-child(3)').attr('src', pathImg('items/Зачіска.png'));

    $('#head').attr('src', pathImg('items/Зачіска.png'));
    // $('#body').attr('src', pathImg('items/Початкова_одежа.png'));
    return
  }

  if (body_name === 'head') {
    // $('#head').remove();
    delete user_close_img.head;
    $('#row0 .active').attr('src', border_aurum);

  }
  if (body_name === 'body') {
    $('#body').remove();
    delete user_close_img.body;
    $('#row1 .active').attr('src', border_aurum);
  }
  if (body_name === 'legs') {
    $('#legs').remove();
    delete user_close_img.legs;
    $('#row2 .active').attr('src', border_aurum);
  }
  if (body_name === 'foots') {
    $('#foots').remove();
    delete user_close_img.foots;
    $('#row3 .active').attr('src', border_aurum);
  }
  if (body_name === 'r_arm') {
    $('#r_arm').remove();
    delete user_close_img.r_arm;
    $('#row4 .active').attr('src', border_aurum);
  }
  if (body_name === 'l_arm') {
    $('#l_arm').remove();
    delete user_close_img.l_arm;
    $('#row5 .active').attr('src', border_aurum);
  }
}

function clouds(revers = false) {

  const cloudPositions = [
    { type: 'left', left: '20.8993vw', top: '-45.3219vh' },
    { type: 'right', right: '79.0318vw', top: '49.8498vh' },
    { type: 'left', left: '32.7327vw', top: '10.156vh' },
    { type: 'right', right: '34.4221vw', top: '40.4836vh' },
    { type: 'left', left: '25.5036vw', top: '-55.5782vh' },
    { type: 'right', right: '29.4046vw', top: '-10.6519vh' },
    { type: 'left', left: '40.6466vw', top: '43.8247vh' },
    { type: 'right', right: '74.0826vw', top: '24.5656vh' },
    { type: 'left', left: '-76.5432vw', top: '-22.8656vh' },
    { type: 'right', right: '38.3928vw', top: '-51.4641vh' },
  ];

  cloudPositions.forEach(pos => {
    let cloud = $('<div class="cloud"></div>');
    cloud.addClass(pos.type);


    $('body').append(cloud);

    if (!revers) {
      if (pos.left) {
        cloud.css({
          left: '-100vw',
          top: pos.top,
        });
      }
      if (pos.right) {
        cloud.css({
          right: '-100vw',
          top: pos.top,
        });
      }

      cloud.animate({
        left: pos.left ? pos.left : 'auto',
        right: pos.right ? pos.right : 'auto'
      }, 1700);

    }
    else {
      if (pos.left) {
        cloud.css({
          left: pos.left,
          top: pos.top,
        });
      }
      if (pos.right) {
        cloud.css({
          right: pos.right,
          top: pos.top,
        });
      }

      cloud.animate({
        left: pos.left ? '200vw' : 'auto',
        right: pos.right ? '200vw' : 'auto'
      }, 3000)

    }





  });

}
function getDataTask(e) {
  let temp;
  crd_id = $(e.target).closest('.task').attr('crd_id')
  // $('input[type=submit]').first().val('Редагувати');
  // if (column === 1) {
  //     $('.card_body h2').first().text('Створити звичку');
  // }
  // else if (column === 2) {
  //     $('.card_body h2').first().text('Створити справу');
  // }
  // else if (column === 3) {
  //     $('.card_body h2').first().text('Створити завдання');
  // }
  $.ajax({
      method: "GET",
      url: "tasks/" + crd_id,
      // data: { 'id': crd_id },
      processData: false,
      contentType: false,
      fail: () => { alert("всё пропало") },
      success: (data) => {
          console.log(data)
          data_ = upFormData(data.column);
          // alert('success')

          const [sdate, stime] = data.datetime_start.split(' ');
          const [fdate, ftime] = data.datetime_finish.split(' ');

          // console.log($('#rep_cal').first())
          // crd_id = data.id;
          $('#name').first().val(data.name);
          $('#description').first().val(data.description);
          $('#complexity').first().val(data.complexity);
          $('#sdate_tsk').first().val(sdate);
          $('#stime_tsk').first().val(stime.slice(0, 5));
          $('#fdate_tsk').first().val(fdate);
          $('#ftime_tsk').first().val(ftime.slice(0, 5));
          $('#rep_int').first().val(data.rep_val);
          $('#sel_rep_int').first().val(data.val_to_rep);
          $('#grp_tsk').first().val(data.category_id);
          $('#rep_cal').first().find('input[type=checkbox]').each((index, el) => {
              if (data.rep_days_week && data.rep_days_week.indexOf(el.getAttribute('day')) !== -1) {
                  el.checked = true;
                  el.parentElement.style.background = 'black';
              }
          });


          $('.shtora').css('display', 'flex');
      }
  })


}

function upFormData(column = 0, crd_id = null) {
  let data = new FormData($('#form-crd')[0])
  // console.log($('#form-crd')[0])
  data.set('column', column);
  if (crd_id) data.set('id', crd_id);


  let week_days = '', zap = '';
  // console.log(week_days)
  $("#rep_cal input[type=checkbox]:checked").each((index, el) => {
      week_days += zap + el.getAttribute('day');
      zap = ',';
  })
  data.set('week_days', week_days);
  return data;
}


function pathImg(path) {
  return 'https://' + document.domain + '/img/all_img/' + path;
}