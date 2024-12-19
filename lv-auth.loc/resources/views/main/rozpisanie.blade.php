@extends('layouts.main')




@section('css_page')
<link rel="stylesheet" href="{{asset('css/rozpisanie.css')}}" />
@endsection
@section('css_card')
<link rel="stylesheet" href="{{asset('css/card.css')}}" />
@endsection
@section('html_card')
@include('card.card_menu')
@endsection
@section('scripts')
<script src="{{asset('js/rozpisanie.js')}}"></script>
<script>
    let currentDate
    if ({{$date}}) {
        [year, month, day] = '{{$date}}'.split('-').map(Number);
        currentDate = new Date(year, month-1, day);
    }
    else
        currentDate = new Date();

    console.log(currentDate)
    function update_schedule(currentDate = '{{$date}}') {
        // currentDate = formatDate(currentDate);
        $('.task').remove()
        // console.log($('.task'))
        // console.log(currentDate)
        $.ajax({
            type: 'POST',
            url: '{{route('rozpisanie.day')}}',
            headers: {
                'X-CSRF-Token': '{{csrf_token()}}'
            },
            data: { date: currentDate },
            fail: () => { alert("всё пропало") },
            success: (data) => {
                tasksArray = []
                // alert('Подключились')
                // console.log(data)


                data.forEach((row) => {
                    console.log(row)
                    if(row.column === 1) return;
                    let temp = {};
                    temp.taskName = row.name;
                    temp.crd_id = row.id;
                    temp.taskDetails = row.description;
                    temp.complete = Boolean(row.datetime_completed);
                    if (row.datetime_start.slice(-1) === '0') {
                        temp.startTime = row.datetime_start.split(' ')[1].slice(0, 5);
                        temp.endTime = row.datetime_finish.split(' ')[1].slice(0, 5);
                        temp.targetContainer = "schedule-container";
                    }
                    else {
                        temp.targetContainer = "tasks";
                    }
                    tasksArray.push(temp)


                    // console.log(temp)
                });

                // console.log(tasksArray[0])
                schUp(tasksArray)

            },
            error: () => {
                alert('Не подключились')
            },
        })

    }


    function upBase(currentDate = '{{$date}}') {
        let tasks = $('.task'), tasks_data = [{}, {}, {}, {}];
        let form_data = new FormData();

        tasks.each((index, el) => {
            console.log(el);
            tasks_data[index].timestart = el.getAttribute('data-start')
            tasks_data[index].timefinish = el.getAttribute('data-end')
            tasks_data[index].task_id = el.getAttribute('crd_id')
            tasks_data[index].date_set = currentDate
        })

        form_data.append('tasks', tasks_data);
        // console.log(form_data.get('tasks'));

        $.ajax({
            type: 'POST',
            url: '{{route('record.update')}}',
            // data: form_data,
            data: {
                data: tasks_data,
                // day: formatDate(currentDate),
            },
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



    $(() => {
        $(".habbit-bar").each((index, el) => {
            animateProgress(el, el.children[0]);
        })
        update_schedule();

        $(document).on('change', 'input[type="checkbox"]', (e) => {
            e.preventDefault();
            e.stopPropagation();
            let form_data = new FormData();
            let card = $(e.target).closest('.task')
            form_data.append('id', card.attr('crd_id'));
            form_data.append('date', formatDate(currentDate));
            form_data.append('complete', e.target.checked);
            // console.log(e.target.checked)
            $.ajax({
                type: 'POST',
                url: "{{route('task.complete')}}",
                headers: {
                    'X-CSRF-Token': '{{csrf_token()}}'
                },
                data: form_data,
                processData: false,
                contentType: false,
                // success: () => {
                //     alert('success');

                // },
                // error: () => {
                //     alert('error');

                // },

            })
        })

    });
</script>
@endsection
@section('content')

<div class="container">
    <div class="left-column">
        <section class="recent-tasks">
            <h2>Недавні завдання</h2>
            <p>*додай або видали завдання</p>
            <div class="tasks">
                <!-- <div class="task yellow">Піти на курси Ісп.</div>
                    <div class="task green">Піти на прогулянку з собакою</div>
                    <div class="task red">Завантаж логово</div>
                    <div class="task teal">Сформувати графік на наст. тиждень</div>
                    <div class="task orange">Піти до басейну</div>
                    <div class="task blue">Допомогти мамі в саду</div>
                    <div class="task purple">Зробити подарунок на дн</div>
                    <div class="task purple">...</div> -->
            </div>
        </section>

        <section class="habit-tracker">
            <h3>Відмічай протягом тижня виконані звички у твоєму розкладі</h3>
            <p>*Тут ти зможеш побачити графік твоїх відмічених звичок протягом місяця</p>


            @foreach ($habbits as $habbit)
                <div class="habit">
                    <p>{{$habbit->name}}</p>
                    <div class="habbit-bar" style="background-image: url({{asset('img/all_img/habbit_bar.png')}})">
                        <h2>{{$habbit->percent}}</h2>
                    </div>
                </div>
            @endforeach
        </section>
    </div>

    <div class="schedule">
        <div class="date-controls">
            <button id="prev-day" class="date-nav">◀</button>
            <a href="{{route('statistic')}}" id="current-date">Вт. 13.08.24</a>
            <button id="next-day" class="date-nav">▶</button>
        </div>
        <div class="scrollable-schedule">
            <div class="schedule-container">
            </div>
        </div>
    </div>
    <button class="brn_save">Сохранить</button>
</div>
@endsection