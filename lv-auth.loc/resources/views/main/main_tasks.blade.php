@extends('layouts.main')

@section('css_page')
<link rel="stylesheet" href="{{asset('css/main.css')}}" />
@endsection
@section('css_card')
<link rel="stylesheet" href="{{asset('css/card.css')}}" />
@endsection
@section('html_card')
@include('card.card_menu')
@endsection
@section('scripts')
@if (auth()->user()->study === 0)
    <script src="{{asset('js/study.js')}}"></script>
@endif
<script>
    let study_user = 0;

    function del_card(e) {
        e.preventDefault();
        alert("Удаляем?");

        card = e.target.parentElement

        console.log(card);

        $.ajax({
            url: "{{route('task.delete')}}",
            method: "get",
            data: { id: card.getAttribute("crd_id") },
            fail: () => { alert("всё пропало") },
            success: () => {
                card.remove();
                counter_tsk();
            },
            error: () => {
                // alert('error delete')
                // card.remove();
            },
        })
    }
    function counter_tsk() {
        $('.bar').each((index, value) => {
            let temp = $(value)
            temp.find('.count_tsk>p').text(temp.find('.task').length);
        })
    }
    function add_card(crd_id, column, name = 'Безымянный', description = 'Без описания') {
        let card = document.createElement("div");
        card.className = 'task';
        card.setAttribute("crd_id", crd_id);



        let form = document.createElement("form");
        form.className = 'side';
        form.method = 'post';
        checkbox = document.createElement("input");
        checkbox.setAttribute("type", 'checkbox')
        form.append(checkbox)

        let Token = document.createElement("input");
        Token.setAttribute("type", "hidden");
        Token.setAttribute("name", "_token");
        Token.setAttribute("value", "{{csrf_token()}}");

        let p_n = document.createElement("p");
        p_n.classList.add(...['text', 'name']);
        p_n.innerHTML = name;

        let p_d = document.createElement("p");
        p_d.classList.add(...['text', 'description']);
        p_d.innerHTML = description;

        let p_s = document.createElement("p");
        p_s.classList.add(...['text', 'seria']);
        p_s.innerHTML = '|>0/0';


        // p_dc = document.createElement("p");
        // p_dc.setAttribute("class", "card-date");
        // p_dc.innerHTML = data_card;

        let div_x = document.createElement("div");
        div_x.classList.add('delete');
        div_x.innerHTML = "x";

        card.prepend(...[p_n, form, p_d, p_s, div_x]);
        // card.prepend(p_dc);

        $("#Zad_" + column).find('.table_tsk').prepend(card);
        counter_tsk();
    }
    function clearForm() {
        $('#name').first().val('');
        $('#description').first().val('');
        $('#complexity').first().val('1');
        $('#sdate_tsk').first().val('');
        $('#stime_tsk').first().val('');
        $('#fdate_tsk').first().val();
        $('#ftime_tsk').first().val('');
        $('#rep_int').first().val('0');
        $('#sel_rep_int').first().val('1');
        $('#grp_tsk').first().val('1');
        $('#rep_cal').first().find('input[type=checkbox]').each((index, el) => {
            el.checked = false;
            el.parentElement.style.background = '#275154';
        });

    }

    function addTask(data_) {
        $.ajax({
            type: 'POST',
            url: "{{route('task.store')}}",
            data: data_,
            processData: false,
            contentType: false,
            success: (data) => {
                // console.log(data);
                // alert('success');
                add_card(data.id, data.column, data.name, data.description)
                counter_tsk();
                $('input[type=submit]').prop('disabled', false)
                $('.shtora').css('display', 'none');

                console.log(data);
            },
            error: (e) => {
                alert('error')
                $('input[type=submit]').prop('disabled', false)
            },
        })
    }
    function build_card_menu(str_operation, column) {

        $('input[type=submit]').first().val(str_operation);
        $('.card_body .grid_grp, .card_body .grid_grp+, .card_body .grid_grp++').css('display', 'none')
        $('#fdate_tsk').css('display', 'block')
        $('#sdate_tsk').css('grid-column', '1 / span 1')
        if (column === 1) {
            $('.card_body h2').first().text(str_operation + ' звичку');
        }
        else if (column === 2) {
            $('.card_body h2').first().text(str_operation + ' справу');
            $('.card_body .grid_grp').css('display', 'grid')
            $('.card_body .grid_grp+, .card_body .grid_grp++').css('display', 'flex')
        }
        else if (column === 3) {
            $('.card_body h2').first().text(str_operation + ' завдання');
            $('.card_body .grid_grp').css('display', 'grid')
            $('.card_body .grid_grp+').find('select, input').val(1)
            $('#fdate_tsk').css('display', 'none')
            $('#sdate_tsk').css('grid-column', '1 / span 2')
            console.log($('#rep_int').val())
        }
    }

    $(".bar").on('change', 'input[type="checkbox"]', (e) => {
        e.preventDefault();
        e.stopPropagation();

        let form_data = new FormData($(e.target).closest('.side')[0]);
        let card = $(e.target).closest('.task')
        form_data.append('id', card.attr('crd_id'));
        form_data.append('date', card.attr('date_set'));
        form_data.append('complete', e.target.checked);
        console.log(e.target.checked)
        $.ajax({
            type: 'POST',
            url: "{{route('task.complete')}}",
            headers: {
                'X-CSRF-Token': '{{csrf_token()}}'
            },
            data: form_data,
            processData: false,
            contentType: false,
            success: (data) => {
                // alert('success');
                let spans = $('.currency-icons span')
                if (spans.first()[0].innerHTML != data.original.dm) {
                    spans.first().animate({ color: spans.first()[0].innerHTML < data.original.dm ? 'green' : 'red', fontSize: "30px" }, 300)
                    setTimeout(() => {
                        spans.first().animate({ color: 'white', fontSize: "24px" }, 300)
                        spans.first().text(data.original.dm)
                    }, 300)
                }
                if (spans.last()[0].innerHTML != data.original.gm) {
                    spans.last().animate({ color: spans.last()[0].innerHTML < data.original.gm ? 'green' : 'red', fontSize: "30px" }, 300)
                    setTimeout(() => {
                        spans.last().animate({ color: 'white', fontSize: "24px" }, 300)
                        spans.last().text(data.original.gm)
                    }, 300)
                }

                console.log(spans.first()[0].innerHTML + " : " + data.original.dm)
            },
            // error: () => {
            //     alert('error');

            // },

        })
    })

    let data_, shtora = $('.shtora').first(), crd_id = 0;
    if (study_user === 0) {

    }


    // var crd_id = 0;
    $(() => {
        counter_tsk();
        $('.add_t').on('click', (e) => {//Кнопка "добавить карточку"
            build_card_menu('Додати', Number($(e.target).closest('.bar').attr('id').slice(-1)));
            data_ = upFormData($(e.target).closest('.bar').attr('id').slice(-1));
            // console.log(data_.get('column'))
            $('.shtora').first().css('display', 'flex');
            clearForm();
        })
        $(".x, input[type='reset']").on('click', (e) => {//Закрыть форму карточки
            e.preventDefault();
            shtora.css('display', 'none');
            clearForm();
        })
        $('.grid_grp').first().on('change', "input[type='time'], input[type='date']", (e) => {
            if (e.target.value !== '') e.target.style.color = 'black';
            else e.target.style.color = 'white';
        })
        $('#rep_cal').on('click', "div", (e) => {//Перекрашивание квадратиков дней недели
            e.preventDefault();
            e.target.children[0].checked = !e.target.children[0].checked;
            if (e.target.children[0].checked) e.target.style.background = 'black';
            else e.target.style.background = '#275154';
        })
        $(".table_tsk").on('click', '.delete', (e) => {
            del_card(e);
            e.stopPropagation()
        })
        $(".table_tsk").on('click', '.side>input[type=checkbox]', (e) => { e.stopPropagation() })
        $(".table_tsk").on('click', '.task', (e) => {
            build_card_menu('Редагувати', Number($(e.target).closest('.bar').attr('id').slice(-1)));
            getDataTask(e);
        });
    })




    $('.spin-button').on('click', (e) => {
        let wheel = $('.wheel-container');

        wheel[0].classList.add('show')
    })

</script>

<script>
    $(document).ready(function () {
        const $wheel = $('.wheel');
        const $button = $('.spin-button');

        let currentRotation = 0;

        $button.on('click', function () {
            const minTime = 3;
            const maxTime = 5;

            const spinTime = Math.random() * (maxTime - minTime) + minTime;

            const maxSpeed = 3 * 360;

            const randomAngle = Math.floor(Math.random() * 360);
            const totalRotation = spinTime * maxSpeed + randomAngle;

            currentRotation += totalRotation;

            $wheel.css({
                transitionDuration: `${spinTime}s`,
                transform: `rotate(${currentRotation}deg)`
            });

            setTimeout(function () {
                const effectiveRotation = currentRotation % 360;
                let segmentNumber;

                // Визначення номера сегмента за годинниковою стрілкою
                if (effectiveRotation >= 240 && effectiveRotation < 270) {
                    segmentNumber = 1; // Сегмент 1
                } else if (effectiveRotation >= 270 && effectiveRotation < 300) {
                    segmentNumber = 2; // Сегмент 2
                } else if (effectiveRotation >= 300 && effectiveRotation < 330) {
                    segmentNumber = 3; // Сегмент 3 = белое
                } else if (effectiveRotation >= 330 && effectiveRotation < 0) {
                    segmentNumber = 4; // Сегмент 4
                } else if (effectiveRotation >= 0 && effectiveRotation < 30) {
                    segmentNumber = 5; // Сегмент 5
                } else if (effectiveRotation >= 30 && effectiveRotation < 60) {
                    segmentNumber = 6; // Сегмент 6
                } else if (effectiveRotation >= 60 && effectiveRotation < 90) {
                    segmentNumber = 7; // Сегмент 7
                } else if (effectiveRotation >= 90 && effectiveRotation < 120) {
                    segmentNumber = 8; // Сегмент 8
                } else if (effectiveRotation >= 120 && effectiveRotation < 150) {
                    segmentNumber = 9; // Сегмент 9
                } else if (effectiveRotation >= 150 && effectiveRotation < 180) {
                    segmentNumber = 10; // Сегмент 10
                } else if (effectiveRotation >= 180 && effectiveRotation < 210) {
                    segmentNumber = 11; // Сегмент 11
                } else {
                    segmentNumber = 12; // Сегмент 12
                }

                alert(`Сегмент номер ${segmentNumber} опинився зверху!`);
            }, spinTime * 1000);
        });
    });

</script>


@endsection
@section('content')

<div class="main">
    <form class="search">
        <label for="s_text" class="text">Пошук</label>
        <input type="text" name="s_text" class="text" />
        <button class="search_btn" style="background-color: transparent; border: 0;">
            <img src="{{asset('img/all_img/icons/search.png')}}" />
        </button>
    </form>
</div>

<div class="main">
    <div class="menu">
        <div id="Zad_1" class="bar">
            <div class="bar_head">
                <div>
                    <h2 class="text">Звички</h2>
                    <div class="count_tsk">
                        <p class="text" style="color: #275154;">12</p>
                    </div>
                </div>
                <form class="filter">
                    <input type="radio" id="strong" name="gr1" value="strong" checked />
                    <label for="strong">Сильные</label>
                    <input type="radio" id="week" name="gr1" value="week" />
                    <label for="week">Слабые</label>
                </form>
            </div>
            <button class="add_t">
                <div class="plus"></div>
                <p class="text" style="color: #275154;">Додати звичку</p>
            </button>
            <div class="table_tsk">
                @foreach ($tasks as $task)
                    @if($task->column === 1)
                        <div crd_id="{{$task->id}}" date_set="{{$task->date_set}}" class="task">
                            <div class="card-date" style="display: none">{"name": '{{$task->name}}', "description":
                                '{{$task->description}}',
                                "complexity": {{$task->complexity}}, "datestart": '{{$task->datetime_start}}',
                                "datefinish": '{{$task->datetime_finish	}}', "name": 'name', }</div>
                            <form class="side">
                                @csrf
                                <input type="checkbox" {{$task->datetime_completed ? 'checked' : ''}} />
                            </form>
                            <p class="text name">{{$task->name}}</p>
                            <p class="text description">{{$task->description}}</p>
                            <p class="text seria">|>{{$task->seria_now}}/{{$task->max_seria}}</p>
                            <div class="delete"></div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="fone">
                <img src={{asset('img/all_img/icons/habbit_icon.png')}} />
                <p class="text">Це ваші завдання.<br />Вони виконуються лише один раз. Додайте списки вашим
                    завданням, щоб збільшити нагороду</p>
            </div>
        </div>
        <div id="Zad_2" class="bar">
            <div class="bar_head">
                <div>
                    <h2 class="text">Справи</h2>
                    <div class="count_tsk">
                        <p class="text" style="color: #275154;">12</p>
                    </div>
                </div>
                <form class="filter">
                    <input type="radio" id="current" name="gr2" value="current" checked />
                    <label for="current">Поточні</label>
                    <input type="radio" id="deferred" name="gr2" value="deferred" />
                    <label for="deferred">Відкладені</label>
                </form>
            </div>
            <button class="add_t">
                <div class="plus"></div>
                <p class="text" style="color: #275154;">Додати завдання</p>
            </button>
            <div class="table_tsk">
                @foreach ($tasks as $task)
                    @if($task->column === 2)
                        <div crd_id="{{$task->id}}" date_set="{{$task->date_set}}" class="task">
                            <div class="card-date" style="display: none">{"name": 'name', "description": 'description',
                                "complexity": 0, "datestart": 'name', "name": 'name', }</div>
                            <form class="side">
                                @csrf
                                <input type="checkbox" {{$task->datetime_completed ? 'checked' : ''}} />
                            </form>
                            <p class="text name">{{$task->name}}</p>
                            <p class="text description">{{$task->description}}</p>
                            <p class="text seria">|>{{$task->seria_now}}/{{$task->max_seria}}</p>
                            <div class="delete"></div>
                        </div>
                    @endif
                @endforeach
                <div class="fone">
                    <img src={{asset('img/all_img/icons/Нотатки.png')}} />
                    <p class="text">Це ваші завдання.<br />Вони виконуються лише один раз. Додайте списки вашим
                        завданням, щоб збільшити нагороду</p>
                </div>
            </div>
        </div>
        <div id="Zad_3" class="bar">
            <div class="bar_head">
                <div>
                    <h2 class="text">Завдання</h2>
                    <div class="count_tsk">
                        <p class="text" style="color: #275154;">12</p>
                    </div>
                </div>
                <form class="filter" style="max-width: 230px;">
                    <input type="radio" id="active" name="gr3" value="active" checked />
                    <label for="active">Активні</label>
                    <input type="radio" id="w_date" name="gr3" value="w_date" />
                    <label for="w_date" style="text-wrap: nowrap;">З датою</label>
                    <input type="radio" id="completed" name="gr3" value="completed" />
                    <label for="completed">Виконані</label>
                </form>
            </div>
            <button class="add_t">
                <div class="plus"></div>
                <p class="text" style="color: #275154;">Додати звичку</p>
            </button>
            <div class="table_tsk">
                @foreach ($tasks as $task)
                    @if($task->column === 3)
                        <div crd_id="{{$task->id}}" date_set="{{$task->date_set}}" class="task">
                            <div class="card-date" style="display: none">{"name": 'name', "description": 'description',
                                "complexity": 0, "datestart": 'name', "name": 'name', }</div>
                            <form class="side">
                                @csrf
                                <input type="checkbox" {{$task->datetime_completed ? 'checked' : ''}} />
                            </form>
                            <p class="text name">{{$task->name}}</p>
                            <p class="text description">{{$task->description}}</p>
                            <p class="text seria" style="grid-area: 3/2/span 1/span 2;">Дедлайн |>{{$task->datetime_finish}}</p>
                            <div class="delete"></div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="fone">
                <img src={{asset('img/all_img/icons/Галочка.png')}} />
                <p class="text">Це ваші завдання.<br />Вони виконуються лише один раз. Додайте списки вашим
                    завданням, щоб збільшити нагороду</p>
            </div>
        </div>
    </div>
</div>

@endsection