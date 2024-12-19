let tabName;
$(() => {
    let quest_bars = $('.quests')
    quest_bars.each((index, el_b) => {
        el_b = $(el_b).find('.quest-item:not(:first)')
        scroll_fog(el_b);
    })
})
$('.product-grid').on('click', '.product-card', (e) => {
    e.stopPropagation();
    $('.shtora').css('display', 'flex');
    $('.item-card').css({ 'display': 'flex', 'z-index': 101, });
    $('.task-card').css({ 'display': 'none' });
})
$('.quest-item').on('click', '.quest-button', (e) => {
    e.stopPropagation();
    $('.shtora').css('display', 'flex');
    $('.task-card').css({ 'display': 'flex', 'z-index': 101, });
    $('.item-card').css({ 'display': 'none', 'z-index': -1, });


    $.ajax({
        type: 'GET',
        url: "quests/" + $(e.target).closest('.quest-item').attr('crd_id'),
        // data: { id: },
        processData: false,
        contentType: false,
        success: (data) => {
            let quest_card = $('.task-card');

            quest_card.find('.task-image').attr('src', data.path_title_img)
            quest_card.find('h2').text(data.name)
            quest_card.find('.task-description').text(data.description)
            quest_card.find('.reward-section img').text(data.path_icon_img)
            quest_card.find('.price-section span').text('Цiна: '+data.price)
            let character = quest_card.siblings('.char_nar')
console.log(character)
            switch(data.rynok_pos){
                case 1: character.attr('src', pathImg('narrators/big/Дiвчина_з_зiллям.png')); break;
                case 2: character.attr('src', pathImg('narrators/big/Кузнец.png')); break;
                case 3: character.attr('src', pathImg('narrators/big/Тавернщик.png')); break;
            }
        },
        error: () => {
            alert('Не нашёл данных квеста')
        },
    })
})
$('.item-card').on('click', '.product-card', (e) => {
    e.stopPropagation();
    alert("штора")
})
$('.task-card').on('click', '.quest-button', (e) => {
    e.stopPropagation();
    alert("штора")
})
function openTab(event, tabName) {
    $(".tab-content").each((index, el) => { el.style.display = "none"; });
    $(".tab-button").each((index, el) => { el.className = el.className.replace(" active", ""); });

    console.log(event)
    console.log($('.' + tabName))
    $('.' + tabName).each((index, el) => { el.style.display = "flex" });
    event.currentTarget.className += " active";
}
// function tab_active() {
//     $('.tabs').find('stick')
// }

$('.carousel-item .quests').on('scroll', function () {
    let quest_cards = $('.carousel-item.active .quest-item')
    scroll_fog(quest_cards);
});

function scroll_fog(mnozestwo) {
    let scrollCoef = 0.005;

    mnozestwo.each((index, el) => {
        el.style.opacity = 1.22 - Math.sqrt(Math.pow(5.9 / 8 * ((index + 1) + 0.3 - $('.carousel-item.active .quests').scrollTop() * scrollCoef - (el.offsetHeight / 100)), 2), 2);
    })
}