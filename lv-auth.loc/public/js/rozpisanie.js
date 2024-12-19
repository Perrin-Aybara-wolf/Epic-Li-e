const schdl_container = $('.schedule-container');
let focus_task = 0, arrow_active = 0;
const del_halfhour = 6;

let time1, time2;

let arr_time_shc = [];

setMinMaxCards();

$('#prev-day').on('click', (e) => {
    e.stopPropagation()
    currentDate.setDate(currentDate.getDate() - 1);
    updateDateDisplay();
    update_schedule(formatDate(currentDate))
});

$('#next-day').on('click', (e) => {
    e.stopPropagation()
    currentDate.setDate(currentDate.getDate() + 1);
    updateDateDisplay();
    update_schedule(formatDate(currentDate))
});


$('.brn_save').on('click', (e) => {
    e.stopPropagation();
    upBase(formatDate(currentDate))
});

$(() => {
    let arrowUp, arrowDown;
    arrowUp = document.createElement('div');
    arrowUp.classList.add('arrow', 'arrow-up');
    arrowDown = document.createElement('div');
    arrowDown.classList.add('arrow', 'arrow-down');
    schdl_container.append(arrowUp, arrowDown);
    let arrows = $('.arrow');
    arrowUp = $('.arrow-up');
    arrowDown = $('.arrow-down');
    const startTime = new Date(0, 0, 0, 0);


    for (let i = 0; i < 48; i++) {
        let hours = startTime.getHours().toString().padStart(2, '0');
        let minutes = startTime.getMinutes().toString().padStart(2, '0');
        // let time = `${hours}:${minutes}`;

        let time_block = document.createElement('div');
        time_block.className = 'time-block';
        time_block.style.gridRow = `${i * del_halfhour + 1} / span ${del_halfhour}`;
        time_block.innerHTML = `${hours}:${minutes}`;
        schdl_container.append(time_block);
        startTime.setMinutes(startTime.getMinutes() + 30);
    }

    for (let i = 0; i < 48 * del_halfhour; i++) {


        let hours = startTime.getHours().toString().padStart(2, '0');
        let minutes = startTime.getMinutes().toString().padStart(2, '0');

        let e_div = document.createElement('div');
        e_div.style.gridRow = i + 1;
        e_div.className = 'empty-div';
        e_div.setAttribute('time', `${hours}:${minutes}`);
        // e_div.innerHTML = i;
        schdl_container.append(e_div);
        startTime.setMinutes(startTime.getMinutes() + 30 / del_halfhour);
    }

    updateDateDisplay();

    schdl_container.on('contextmenu', '.task', (e) => {
        let task = getTask(e.target)
        openModal(e);
        console.log(task)
        return false
    })


    let newX = 0, newY = 0, startX = 0, startY = 0;
    let old_time;



    schdl_container.on('mousedown', '.arrow', (e_arrow_down) => {
        e_arrow_down.stopPropagation()
        arrow_active = e_arrow_down.target;
        arrowDown.css({ 'display': 'block', })
        arrowUp.css({ 'display': 'block', })
        if (arrow_active.classList.contains('arrow-down')) {
            arrowUp.css('display', 'none')
        }
        else {
            arrowDown.css('display', 'none')
        }
        $(document).on('mousemove', '.arrow', (e_arrow_move) => {
            e_arrow_move.stopPropagation()
            focus_task[0].classList.add('stretch')


            schdl_container.off('mouseover')
            schdl_container.on('mouseover', '.empty-div', (e_empt_d) => {
                let arrow = e_arrow_move.target;

                if (arrow_active.classList.contains('arrow-down')) {

                    if (Number(arrowUp.css('grid-row')) + 2 > e_empt_d.target.style.gridRow) {
                        arrow_active.style.gridRow = Number(arrowUp.css('grid-row')) + 3;
                        console.log('Максимально сжали карточку');
                    }
                    else {
                        if (getRowIndex(focus_task.attr('maxtime')) < e_empt_d.target.style.gridRow) {
                            console.log('упёрлись');
                            arrow_active.style.gridRow = Number(old_time.style.gridRow);
                        }
                        else {
                            old_time = e_empt_d.target
                        }
                        arrow_active.style.gridRow = Number(old_time.style.gridRow);
                    }
                    focus_task.css('grid-row', focus_task.css('grid-row').replace(/\/ \d+/, "/ " + (Number(arrow_active.style.gridRow) + 1)));
                    focus_task.attr('data-end', old_time.nextSibling.nextSibling.getAttribute('time'));
                    // console.log(arrow_active.style.gridRow);
                }
                else if (arrow_active.classList.contains('arrow-up')) {
                    if (Number(arrowDown.css('grid-row')) - 2 < e_empt_d.target.style.gridRow) {
                        arrow_active.style.gridRow = Number(arrowDown.css('grid-row')) - 3;
                        console.log('Максимально сжали карточку');
                    }
                    else {
                        if (getRowIndex(focus_task.attr('mintime')) > e_empt_d.target.style.gridRow) {
                            console.log('упёрлись');
                            arrow_active.style.gridRow = Number(old_time.style.gridRow);
                        }
                        else {
                            old_time = e_empt_d.target
                            arrow_active.style.gridRow = Number(old_time.style.gridRow);
                        }
                    }
                    focus_task.css('grid-row', focus_task.css('grid-row').replace(/\d+ \//, arrow_active.style.gridRow + '/'));
                    focus_task.attr('data-start', old_time.getAttribute('time'));
                }
            })
        })

    })

    $('body').on('mousedown', (e_doc_down) => {
        e_doc_down.preventDefault();
        if (e_doc_down.target === $('#prev-day')[0] && e_doc_down.target === $('#next-day')[0]) {
            return
        }
        if (e_doc_down.target.classList.contains('empty-div')) return false;
        //Чистим поле расписания
        // schdl_container.find('.task').each((index, task) => {
        //     task.style.zIndex = 1;
        //     if (task.classList.contains('stretch'))
        //         task.classList.remove('stretch');
        //     if (task.classList.contains('dragged'))
        //         task.classList.remove('dragged');
        // });


        console.log(getTask(e_doc_down.target))
        if (getTask(e_doc_down.target) !== false || e_doc_down.target.classList.contains('empty-div'))
            time1 = new Date();

        $(document).on('mousemove', (e_doc_move) => {
            if (focus_task && (new Date() - time1) / 95 > 1 && !e_doc_down.target.classList.contains('arrow')) {

                if (!focus_task[0].classList.contains('dragged')) {
                    focus_task[0].classList.add('dragged');
                }


                schdl_container.off('mouseover')
                schdl_container.on('mouseover', '.empty-div', (e_empt_d) => {
                    console.log('mouseover empty')
                })

                // focus_task.css({ 'position': 'fixed' })

                startX = e_doc_move.clientX;
                startY = e_doc_move.clientY;
                const x = e_doc_move.clientX; // получаем координату X мыши
                const y = e_doc_move.clientY; // получаем координату Y мыши

                // console.log(`Координаты мыши: x=${x}, y=${y}`); // выводим координаты мыши в консоль
                newX = e_doc_move.clientX;
                newY = e_doc_move.clientY;

                startX = e_doc_move.clientX;
                startY = e_doc_move.clientY;

                focus_task.css('top', (newY - 10) + 'px')
                focus_task.css('left', (newX - 20) + 'px')
                // console.log(`Координаты focus_task: x=${newX - 20}, y=${newY - 10}`); // выводим координаты мыши в консоль



            }
        })


    })
    $(document).on('mousedown', '.task', (e_task_down) => {
        time1 = new Date();
        focus_task = getTask(e_task_down.target);
        // console.log(focus_task)
        console.log('mousedown tasks')
    })
    $('body').on('mouseup', '*', (e_doc_up) => {
        e_doc_up.stopPropagation();
        $(arrow_active).css('display', 'none');
        $('.arrow').css('display', 'none');
        $(document).off('mousemove')
        schdl_container.off('mouseover')
        if (focus_task) {
            if (getTask(e_doc_up.target)[0] !== focus_task[0]) {
                if (focus_task[0].classList.contains('stretch'))
                    focus_task[0].classList.remove('stretch');
                // console.log(focus_task[0].classList);
            }
            if (focus_task[0].classList.contains('dragged')) {
                focus_task[0].classList.remove('dragged')
            }

            if ((new Date() - time1) / 95 > 1) {
                if (arrow_active === 0) {
                    append_task(e_doc_up.target, focus_task)
                }
                focus_task.css({ 'top': 0, 'left': 0, 'z-index': 1 });
                focus_task = 0;
            }
            else {
                // console.log(focus_task)
                // console.log('===')
                if (getTask(e_doc_up.target)[0].classList.contains('task')) {
                    if (focus_task.closest(schdl_container).length > 0) {
                        focus_task[0].classList.add('stretch');
                        console.log("stretch")
                    }
                    if (focus_task[0] === getTask(e_doc_up.target)[0]) {
                        // focus_task[0].className += ' stretch';
                        console.log("ona")

                    }
                    else {
                        console.log("nie ona")
                    }

                    // focus_task[0].classList = 'task';
                }

                append_task(e_doc_up.target, focus_task);
                
                console.log(focus_task[0])
                console.log(getTask(e_doc_up.target)[0])
                console.log(focus_task[0] === getTask(e_doc_up.target)[0])

                if (focus_task[0] === getTask(e_doc_up.target)[0] && e_doc_up.target.checked === undefined) {

                    if (focus_task[0].getAttribute('data-start') === null)
                        return
                    // console.log(focus_task[0].getAttribute('data-start'))

                    let startIndex, endIndex;
                    startIndex = getRowIndex(focus_task[0].getAttribute('data-start'));
                    endIndex = getRowIndex(focus_task[0].getAttribute('data-end')) - 2;

                    if (arrowUp.css('display') === 'none' && focus_task.closest('.tasks').length <= 0) {
                        arrowUp.css({ 'display': 'block', 'grid-row': `${startIndex}` });
                        arrowDown.css({ 'display': 'block', 'grid-row': `${endIndex}` });
                    }
                    else {
                        arrowUp.css({ 'display': 'none', });
                        arrowDown.css({ 'display': 'none', });
                    }
                    if (focus_task.closest('.tasks').length > 0) {
                        console.log('sch')
                        // schdl_container.append(focus_task);

                    }
                }
            }
        }

        // focus_task = 0;
        arrow_active = 0;
        setMinMaxCards();
    })

    $(document).on('change', '.task-checkbox', (e) => {
        e.stopPropagation()
        check_tasks()
    })


    $('body').on('click', (e_doc_cl) => {
        let temp = getTask(e_doc_cl.target);
        if (temp && temp[0].classList.contains('task') && schdl_container.find(temp).length > 0) {
            console.log('click some')
            arrowDown.css({ 'display': 'block', })
            arrowUp.css({ 'display': 'block', })
        } else if (focus_task) {
            if (focus_task[0].classList.contains('stretch'))
                focus_task[0].classList.remove('stretch');
            if (focus_task[0].classList.contains('dragged'))
                focus_task[0].classList.remove('dragged');
            arrowDown.css({ 'display': 'none', })
            arrowUp.css({ 'display': 'none', })
        }
    })
});



function getRowIndex(time) {
    if (!time) return false;
    let [hours, minutes] = time.split(':').map(Number);
    minutes += 30 / del_halfhour;
    if (minutes % 5 !== 0)
        minutes += (minutes % 5 < 3 ? -minutes % 5 : (5 - minutes % 5));

    // console.log(hours)

    const totalMinutes = hours * 60 + minutes;
    // console.log(Math.floor(totalMinutes / 30 ))
    return Math.floor(totalMinutes / 30 * del_halfhour);
}
function getGridRowsArea(startTime, endTime) {
    const startIndex = getRowIndex(startTime);
    const endIndex = getRowIndex(endTime);
    // console.log(`${startIndex} / ${endIndex}`)
    return `${startIndex} / ${endIndex}`;
}
function getTask(element) {
    let temp = $(element);
    if (element.classList.contains('task'))
        return temp;
    else if (temp.closest('.task').length > 0)
        return temp.closest('.task');
    else
        return false;
}
function openModal(e) {
    alert('меню карты');
    $('.shtora').css('display', 'flex');

    getDataTask(e)
    
}
function setMinMaxCards() {
    let tasks = schdl_container.find('.task').sort((a, b) => {
        // console.log(getRowIndex(a.getAttribute('data-start')) - getRowIndex(b.getAttribute('data-start')));

        return getRowIndex(a.getAttribute('data-start')) - getRowIndex(b.getAttribute('data-start'));
    })
    // console.log(tasks);
    tasks.each((index, task, arr) => {
        if (index === 0)
            task.setAttribute('mintime', '00:00')
        else {
            task.setAttribute('mintime', tasks[index - 1].getAttribute('data-end'))
        }

        if (tasks.length - 1 === index)
            task.setAttribute('maxtime', '23:50')
        else {
            task.setAttribute('maxtime', tasks[index + 1].getAttribute('data-start'))
        }
    });
    return tasks;
}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}
function schUp(tasksArray) {

    // console.log(tasksArray)
    // alert('schUp')
    // tasksArray.forEach((task) => {
    //     console.log(task)
    // })

    tasksArray.forEach(function (task) {

        // console.log(task)

        let taskElement = document.createElement('div');
        taskElement.className = 'task';
        taskElement.setAttribute('crd_id', task.crd_id);

        // console.log(taskElement)

        let inputElement = document.createElement('input');
        inputElement.className = 'task-checkbox';
        inputElement.setAttribute('type', 'checkbox');
        if (task.complete)
            inputElement.setAttribute('checked', true);
        taskElement.append(inputElement);

        let p_n = document.createElement('p');
        p_n.className = 'name_tsk';
        p_n.innerHTML = task.taskName
        taskElement.append(p_n);

        if (task.startTime) {
            taskElement.style.gridRow = getGridRowsArea(task.startTime, task.endTime);
            taskElement.setAttribute('data-start', task.startTime);
            taskElement.setAttribute('data-end', task.endTime);
            taskElement.setAttribute('stretch', false);
            // taskElement.setAttribute('data-details', task.taskDetails);
            schdl_container.append(taskElement);
        }
        else {
            // taskElement.setAttribute('stretch', true);
            $('.tasks').append(taskElement);
        }

        check_tasks();
    });
}
function updateDateDisplay() {
    const dateElement = document.getElementById('current-date');
    const options = { weekday: 'short', day: 'numeric', month: 'numeric', year: '2-digit' };
    dateElement.textContent = currentDate.toLocaleDateString('uk-UA', options);

    // console.log(formatDate(currentDate))


    // console.log(tasksArray)
    // return tasksArray;
}


function addLine(bar, h2, totalPercent, currentPercent, isGray = false) {
    const line = document.createElement("div");
    line.classList.add("line");

    if (isGray) {
        line.classList.add("gray");
    }

    bar.appendChild(line);

    currentPercent[0] += isGray ? 1 : 2;
    h2.textContent = Math.min(currentPercent[0], totalPercent) + "%";
}
function animateProgress(bar, h2) {
    let totalBars;
    let barSpeed;
    let totalPercent = Number(h2.textContent.slice(0, -1));
    let currentPercent = [0];
    totalBars = Math.floor(totalPercent / 2);
    barSpeed = 1000 / (totalBars + 1);
    for (let i = 1; i <= totalBars; i++) {
        setTimeout(() => addLine(bar, h2, totalPercent, currentPercent), i * barSpeed);
    }

    if (totalPercent % 2 !== 0) {
        setTimeout(() => addLine(bar, h2, totalPercent, currentPercent, true), (totalBars + 1) * barSpeed);
    }
}

function check_tasks() {
    $('.task').each((index, el) => {
        if (el.children[0].checked)
            el.classList.add('complete');
        else if (el.classList.contains('complete'))
            el.classList.remove('complete')
    })

}

function append_task(e_target, task){
    let focus_task = $(task)
    if (e_target.classList.contains('empty-div')) {

        // console.log('epty_div')
        console.log(e_target)

        focus_task.css('grid-row', `${e_target.style.gridRow}/${Number(e_target.style.gridRow) + 4}`);
        focus_task.attr('data-start', e_target.getAttribute('time'));
        focus_task.attr('data-end', $(e_target).next().next().next().next().attr('time'));

        schdl_container.append(focus_task);
    }
    else if (e_target.classList.contains('tasks')) {
        focus_task.removeAttr('data-start')
        focus_task.removeAttr('data-end')
        focus_task.removeAttr('mintime')
        focus_task.removeAttr('maxtime')
        $('.tasks')[0].append(focus_task[0]);
    }
}