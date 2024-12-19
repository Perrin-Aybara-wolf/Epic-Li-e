<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet</title>
    <script src="\Habitica\jquery-3.7.1.js"></script>

    <style>
        div {
            width: 100%;
            height: 100%;
            border: 1px solid black;
            background-color: wheat;
            justify-content: center;
        }

        .tasks {
            width: 700px;
            height: 550px;
            display: flex;
        }

        .zad {
            flex-wrap: wrap;
            align-content: flex-start;
        }

        #Zad_1 {
            background-color: blue;
        }

        #Zad_2 {
            background-color: yellow;
        }

        #Zad_3 {
            background-color: red;
        }

        .tsk {
            margin: 3px;
            height: 20%;
        }
        .card-date{
            display: none;
        }
    </style>

</head>

<body>
    <div style="display: flex; justify-content: flex-start; width: 800px">
        <div class="tasks">
            <div id="Zad_1" class="zad">
                <button class="add_t">Добавить</button>

            </div>
            <div id="Zad_2" class="zad">
                <button class="add_t">Добавить</button>

            </div>
            <div id="Zad_3" class="zad">
                <button class="add_t">Добавить</button>

            </div>

        </div>
        <div class="menu_card" style="display: none; width: 200px">
            <h2>Меню задачи</h2>
            <form id="add_crd" style="display: flex; flex-direction: column">
                <label for="column">Col: </label>
                <input name="column" type="text" />
                <label for="name">Name: </label>
                <input name="name" type="text" />
                <label for="description">Description: </label>
                <textarea name="description" cols="10" rows="4"></textarea>
                <label for="complexity">Сomplexity: </label>
                <input name="complexity" type="number" />

                <label for="timestart">timestart: </label>
                <input name="timestart" type="time" value='' />
                <label for="datestart">datestart: </label>
                <input name="datestart" type="date" value='' />
                <label for="timefinish">timefinish: </label>
                <input name="timefinish" type="time">
                <label for="datefinish">datefinish: </label>
                <input name="datefinish" type="date">


                <div style="display: flex;">
                    <label for="rep">Days repeat: </label>
                    <input name="rep" type="number" style="width: 30px" />
                    <select name="rep_slct">
                        <option id="option_Days">Days</option>
                        <option id="option_Months">Months</option>
                        <option id="option_Years">Years</option>
                    </select>
                </div>
                <div style="display: flex; flex-wrap: wrap;">
                    <label for="pn">Пн: </label>
                    <input day='1' name="pn" type="checkbox">
                    <label for="vt">Вт: </label>
                    <input day='2' name="vt" type="checkbox">
                    <label for="sr">Ср: </label>
                    <input day='3' name="sr" type="checkbox">
                    <label for="ct">Чт: </label>
                    <input day='4' name="ct" type="checkbox">
                    <label for="pt">Пт: </label>
                    <input day='5' name="pt" type="checkbox">
                    <label for="sb">Сб: </label>
                    <input day='6' name="sb" type="checkbox">
                    <label for="vs">Вс: </label>
                    <input day='7' name="vs" type="checkbox">
                </div>
                <button>Добавить</button>
            </form>
        </div>
    </div>
    <div style="width: 300px">
        <form id="search" method="post">
            <input id="user_id" type="text" name="user_id" value=<?php echo $_SESSION['user_id'] ?> />
            <input type="submit" value="добавить" />
        </form>
    </div>
    <div style="width: 300px">
        <form id="calendar" method="post">
            <input type="date" name="date" value=<?php echo date("Y-m-d"); ?> />
        </form>
        <form id="frfrfr" method="get" action="add_task.php">
            <input type="date" name="date" value=<?php echo date("Y-m-d") ?> />
            <input type="submit" />
        </form>
    </div>
    <script>
        $.ajax('update_statistic.php', {
            method: "POST",
            fail: () => { alert("всё пропало") },
            // success: (data) => { alert("всё обновили") }
            success: (data) => { console.log("обновили") }
        })

    </script>

    <script>
        let week = new Object();
        $("#calendar").on("change", "input[name=date]", (e) => {
            let s_temp = $("select"), key = s_temp.find(`option:contains(${s_temp.val()})`).attr('id').slice(7), repeat_ = {}, rep_temp = menu_card.find("input[name=rep]").val();
            rep_temp === '' || rep_temp === 0 ? repeat_ = '' : repeat_[key] = rep_temp;

            console.log(repeat_)
        })

    </script>




    <script>
        let t_check = true, menu_card = $(".menu_card"),
            temp_card = null;

        $(function () {
            $(".zad").on('click', '.tsk', (e) => {
                if (!t_check) {
                    menu_card.css("display", "block");

                    data_card = e.target.getAttribute("crd_id") === null ? $(e.target.parentElement) : $(e.target);
                    data_card = JSON.parse(data_card.children('.card-date').text());
                    let r_key = Object.keys(data_card.repeat)[0];

                    menu_card.find('input[name=name]').val(data_card.name);
                    menu_card.find('textarea[name=description]').val(data_card.description);
                    menu_card.find('input[name=complexity]').val(data_card.complexity);
                    menu_card.find('input[name=timestart]').val(data_card.datestart.slice(11));
                    menu_card.find('input[name=timefinish]').val(data_card.datefinish.slice(11));
                    menu_card.find('input[name=datestart]').val(data_card.datestart.slice(0,10));
                    menu_card.find('input[name=datefinish]').val(data_card.datefinish.slice(0,10));

                    menu_card.find('input[name=rep]').val(data_card.repeat[r_key]);
                    menu_card.find('select[name=rep_slct]').val(r_key);
                    menu_card.find('input[type=checkbox]').each((index, el) =>{if(data_card.week_days.includes(index+1)) el.checked = true});
                    menu_card.find('button').text("Изменить");

                }
                else {
                    menu_card.trigger('reset');
                    temp_card = null;
                }
                t_check = !t_check;
            })
        })
        $(function () {
            menu_card.find('button').on('click', (e) => {
                e.preventDefault();
                let name_ = menu_card.find('input[name=name]').val(),
                    description_ = menu_card.find('textarea[name=description]').val(),
                    complexity_ = menu_card.find('input[name=complexity]').val(),
                    column_ = menu_card.find('input[name=column]').val(),
                    datestart_ = menu_card.find("input[name=datestart]").val(),
                    timestart_ = menu_card.find("input[name=timestart]").val(),
                    datefinish_ = menu_card.find("input[name=datefinish]").val(),
                    timefinish_ = menu_card.find("input[name=timefinish]").val();

                let s_temp = $("select"), key = s_temp.find(`option:contains(${s_temp.val()})`).attr('id').slice(7), repeat_ = {}, rep_temp = menu_card.find("input[name=rep]").val();
                rep_temp === '' || rep_temp === 0 ? repeat_ = '' : repeat_[key] = rep_temp;

                let week_days_ = {};
                $("input[type=checkbox]:checked").each((index, el) => {
                    week_days_[el.getAttribute('day')] = el.checked;
                })
                Object.keys(week_days_).length === 0 ? week_days_ = '' : week_days_;



                if (menu_card.find('button').text() === "Изменить") {
                    $.ajax("update_task.php", {
                        method: "POST",
                        data: {
                            id: temp_card.crd_id,
                            name: name_,
                            description: description_
                        },
                        fail: () => { alert("всё пропало") },
                        success: (data) => {
                            $(`.tsk[crd_id=${data}]`).remove();
                            add_card(name_, description_, temp_card.column_);
                        }
                    })
                }
                else if (menu_card.find('button').text() === "Добавить") {
                    $.ajax("add_task.php", {
                        method: "POST",
                        data: {
                            name: name_,
                            description: description_,
                            complexity: complexity_,
                            column: column_,
                            datestart: datestart_,
                            timestart: timestart_,
                            datefinish: datefinish_,
                            timefinish: timefinish_,
                            repeat: repeat_,
                            week_days: week_days_

                        },
                        fail: () => { alert("всё пропало") },
                        // success: (data) => { add_card(name_, description_, column_, data) }
                        // success: (data) => { alert(data) }
                    })
                }
            })
            t_check = !t_check;
            menu_card.css("display", "none");
        })

        $(function () {
            $(".add_t").on('click', (e) => {
                let nameCol = $(e.target).parent().attr("id");
                if (!t_check) {
                    menu_card.css("display", "block");
                    menu_card.find('input[name=column]').val(nameCol[nameCol.length - 1])
                }
                else menu_card.trigger('reset');
                t_check = !t_check;
            })
        })


        $(function () {
            $(".zad").on('click', '.delete', (e) => {
                alert("Удаляем?");
                t_check = !t_check;

                card = e.target.parentElement

                $.ajax("delete_task.php", {
                    method: "post",
                    data: { id: card.getAttribute("crd_id") },
                    fail: () => { alert("всё пропало") },
                    success: () => {
                        card.remove();
                    }
                })
            })
        })
    </script>

    <script>
        let list_card = [[], [], []];
        show_card();

        let form1 = $("#search");
        form1.on("submit", (e) => {
            e.preventDefault();
            show_card();
        })
        function search_table() {
            for (i = 1; i < 4; i++) {
                $("#Zad_" + i).children().each((index, el) => {
                    if (el.getAttribute("crd_id"))
                        list_card[i - 1][index] = el.getAttribute("crd_id");
                })
            }
        }

        function add_card(name_, description_, num_column_, complexity_, datestart_, datefinish_, repeat_, week_days_, crd_id) {
            card = document.createElement("div");
            card.setAttribute("class", "tsk");
            card.setAttribute("crd_id", crd_id);

            let data_card = JSON.stringify({
                name: name_,
                description: description_,
                num_column: num_column_,
                complexity: complexity_,
                datestart: datestart_,
                datefinish: datefinish_,
                repeat: repeat_,
                week_days: week_days_
            })

            p_n = document.createElement("p");
            p_n.setAttribute("class", "name_tsk");
            p_n.innerHTML = name_;

            p_d = document.createElement("p");
            p_d.setAttribute("class", "description_tsk");
            p_d.innerHTML = description_;

            
            p_dc = document.createElement("p");
            p_dc.setAttribute("class", "card-date");
            p_dc.innerHTML = data_card;

            btn = document.createElement("button");
            btn.setAttribute("class", "delete");
            btn.innerHTML = "x";

            card.append(p_n);
            card.append(p_d);
            card.append(btn);
            card.append(p_dc);

            $("#Zad_" + num_column_).append(card);
        }

        function show_card() {
            $.ajax("show_task.php", {
                method: "POST",
                data: { date: '<?php echo date("Y-m-d H:i:s"); ?>' },
                caches: true,
                fail: () => { alert("всё пропало") },
                success: (data) => {
                    data = JSON.parse(data);
                    data.forEach(el => {
                        if (list_card.length !== 0 && list_card[el.Column_num - 1].find((el_ar, index, arr) => {
                            if (el_ar === el.id) return true;
                        }))
                            return;
                            alert(el.Datetime_start)
                            let temp = {};
                            el.Rep_val ? temp[el.Val_to_rep] = el.Rep_val : temp = null;
                        add_card(el.Name, el.Description, el.Column_num, el.Сomplexity,
                        el.Datetime_start, el.Datetime_finish, temp, el.Rep_days_week, el.id);
                        // значения должны подтягиваться из таблицы статистики, но пока там не реализован триггер, потому берём из того, что есть.
                    });
                    search_table();
                }
            }
            )
        }
    </script>
</body>

</html>