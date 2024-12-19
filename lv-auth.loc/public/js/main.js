// let list_card = [[], [], []];
// function counter_tsk() {
//     let bars = $('.bar');
//     bars.each((index, value) => {
//         let temp = $(value)
//         temp.find('.count_tsk>p').text(temp.find('.table_tsk').children().length);
//     })
// }
// function add_card(name_, description_, num_column_, complexity_, datestart_, datefinish_, repeat_, week_days_, crd_id) {
//     card = document.createElement("div");
//     card.setAttribute("class", "tsk");
//     card.setAttribute("crd_id", crd_id);

//     let data_card = JSON.stringify({
//         name: name_,
//         description: description_,
//         num_column: num_column_,
//         complexity: complexity_,
//         datestart: datestart_,
//         datefinish: datefinish_,
//         repeat: repeat_,
//         week_days: week_days_
//     })

//     p_n = document.createElement("p");
//     p_n.setAttribute("class", "name");
//     p_n.innerHTML = name_;

//     p_d = document.createElement("p");
//     p_d.setAttribute("class", "description");
//     p_d.innerHTML = description_;


//     p_dc = document.createElement("p");
//     p_dc.setAttribute("class", "card-date");
//     p_dc.innerHTML = data_card;

//     btn = document.createElement("button");
//     btn.setAttribute("class", "delete");
//     btn.innerHTML = "x";

//     card.append(p_n);
//     card.append(p_d);
//     card.append(btn);
//     card.append(p_dc);

//     $("#Zad_" + num_column_).children('.table_tsk').append(card);
// }
// function search_table() {
//     for (i = 1; i < 4; i++) {
//         // console.log($("#Zad_" + i).find('.card'))
//         $("#Zad_" + i).find('.card').each((index, el) => {
//             // console.log(el)
//             if (el.getAttribute("crd_id"))
//                 list_card[i - 1][index] = el.getAttribute("crd_id");
//         })
//     }
// }
// function del_card(e) {
//     e.preventDefault();
//     alert("Удаляем?");
//     t_check = !t_check;

//     card = e.target.parentElement

//     console.log(card);

//     $.ajax({
//         url: "{{route('task.delete')}}",
//         method: "get",
//         data: { id: card.getAttribute("crd_id") },
//         fail: () => { alert("всё пропало") },
//         success: () => {
//             card.remove();
//         },
//         error: () => {
//             card.remove();
//         },
//     })
// }



// $(() => {
//     search_table();
//     // show_card();
//     counter_tsk();




//     $(".x, input[type='reset'], input[type='submit']").on('click', (e) => {
//         e.preventDefault();
//         $('.shtora').first().css('display', 'none');
//     })
//     $('.grid_grp').first().on('change', "input[type='time'], input[type='date']", (e) => {
//         if (e.target.value !== '') e.target.style.color = 'black';
//         else e.target.style.color = 'white';
//     })
//     $('#rep_cal').on('click', "button", (e) => {
//         e.preventDefault();
//         e.target.children[0].checked = !e.target.children[0].checked;
//         if (e.target.children[0].checked) e.target.style.background = 'black';
//         else e.target.style.background = '#275154';
//     })
//     $("input[type='submit']").on('click', (e) => {
//         console.log(e.target.value);








        
//         e.preventDefault();
//         let name_ = menu_card.find('input[name=name]').val(),
//             description_ = menu_card.find('textarea[name=description]').val(),
//             complexity_ = menu_card.find('input[name=complexity]').val(),
//             column_ = menu_card.find('input[name=column]').val(),
//             datestart_ = menu_card.find("input[name=datestart]").val(),
//             timestart_ = menu_card.find("input[name=timestart]").val(),
//             datefinish_ = menu_card.find("input[name=datefinish]").val(),
//             timefinish_ = menu_card.find("input[name=timefinish]").val();


//         let s_temp = $("select"), key = s_temp.find(`option:contains(${s_temp.val()})`).attr('id').slice(7), repeat_ = {}, rep_temp = menu_card.find("input[name=rep]").val();
//         rep_temp === '' || rep_temp === 0 ? repeat_ = '' : repeat_[key] = rep_temp;

//         let week_days_ = {};
//         $("input[type=checkbox]:checked").each((index, el) => {
//             week_days_[el.getAttribute('day')] = el.checked;
//         })
//         Object.keys(week_days_).length === 0 ? week_days_ = '' : week_days_;

//         if (e.target.value === "Изменить") {
//             $.ajax("update_task.php", {
//                 method: "POST",
//                 data: {
//                     id: temp_card.crd_id,
//                     name: name_,
//                     description: description_
//                 },
//                 fail: () => { alert("всё пропало") },
//                 success: (data) => { alert("успех")
//                     // $(`.tsk[crd_id=${data}]`).remove();
//                     // add_card(name_, description_, temp_card.column_);
//                 }
//             })
//         }
//         else if (e.target.value === "Додати") {
//             $.ajax("/Habitica/Show_profile/add_task.blade.php", {
//                 method: "POST",
//                 data: {
//                     name: name_,
//                     description: description_,
//                     complexity: complexity_,
//                     column: column_,
//                     datestart: datestart_,
//                     timestart: timestart_,
//                     datefinish: datefinish_,
//                     timefinish: timefinish_,
//                     repeat: repeat_,
//                     week_days: week_days_

//                 },
//                 fail: () => { alert("всё пропало") },
//                 // success: (data) => { add_card(name_, description_, column_, data) }
//                 success: (data) => { alert(data) }
//             })
//         }
//     })
//     $(".table_tsk").on('click', '.delete', (e) => del_card(e))

//     // console.log('fdfd');



// })

// let t_check = true, menu_card = $(".card_data"), shtora = $(".shtora"), temp_card = null;

// // // $(function () {
// // //     $(".table_tsk").on('click', '.card', (e) => {
// // //         shtora.css("display", "flex");

// // //         let data_card = e.target.getAttribute("crd_id") === null ? $(e.target.parentElement) : $(e.target);
// // //         console.log(data_card);
// // //         data_card = JSON.parse(data_card.children('.card-date').text());
// // //         let r_key = Object.keys(data_card.repeat)[0];

// // //         menu_card.find('input[name=name]').val(data_card.name);
// // //         menu_card.find('textarea[name=description]').val(data_card.description);
// // //         menu_card.find('input[name=complexity]').val(data_card.complexity);
// // //         menu_card.find('input[name=timestart]').val(data_card.datestart.slice(11));
// // //         menu_card.find('input[name=timefinish]').val(data_card.datefinish.slice(11));
// // //         menu_card.find('input[name=datestart]').val(data_card.datestart.slice(0, 10));
// // //         menu_card.find('input[name=datefinish]').val(data_card.datefinish.slice(0, 10));

// // //         menu_card.find('input[name=rep]').val(data_card.repeat[r_key]);
// // //         menu_card.find('select[name=rep_slct]').val(r_key);
// // //         menu_card.find('input[type=checkbox]').each((index, el) => { if (data_card.week_days.includes(index + 1)) el.checked = true });
// // //         menu_card.find("input[type='submit']").val("Изменить");

// // //     })
// // // })
// // $(function () {
// //     menu_card.find('submit').on('click', (e) => {
// //         e.preventDefault();
// //         let name_ = menu_card.find('input[name=name]').val(),
// //             description_ = menu_card.find('textarea[name=description]').val(),
// //             complexity_ = menu_card.find('input[name=complexity]').val(),
// //             column_ = menu_card.find('input[name=column]').val(),
// //             datestart_ = menu_card.find("input[name=datestart]").val(),
// //             timestart_ = menu_card.find("input[name=timestart]").val(),
// //             datefinish_ = menu_card.find("input[name=datefinish]").val(),
// //             timefinish_ = menu_card.find("input[name=timefinish]").val();

// //         let s_temp = $("select"), key = s_temp.find(`option:contains(${s_temp.val()})`).attr('id').slice(7), repeat_ = {}, rep_temp = menu_card.find("input[name=rep]").val();
// //         rep_temp === '' || rep_temp === 0 ? repeat_ = '' : repeat_[key] = rep_temp;

// //         let week_days_ = {};
// //         $("input[type=checkbox]:checked").each((index, el) => {
// //             week_days_[el.getAttribute('day')] = el.checked;
// //         })
// //         Object.keys(week_days_).length === 0 ? week_days_ = '' : week_days_;



// //         if (menu_card.find('submit').text() === "Изменить") {
// //             $.ajax("update_task.php", {
// //                 method: "POST",
// //                 data: {
// //                     id: temp_card.crd_id,
// //                     name: name_,
// //                     description: description_
// //                 },
// //                 fail: () => { alert("всё пропало") },
// //                 success: (data) => {
// //                     $(`.tsk[crd_id=${data}]`).remove();
// //                     add_card(name_, description_, temp_card.column_);
// //                 }
// //             })
// //         }
// //         else if (menu_card.find('submit').text() === "Добавить") {
// //             $.ajax("add_task.php", {
// //                 method: "POST",
// //                 data: {
// //                     name: name_,
// //                     description: description_,
// //                     complexity: complexity_,
// //                     column: column_,
// //                     datestart: datestart_,
// //                     timestart: timestart_,
// //                     datefinish: datefinish_,
// //                     timefinish: timefinish_,
// //                     repeat: repeat_,
// //                     week_days: week_days_

// //                 },
// //                 fail: () => { alert("всё пропало") },
// //                 // success: (data) => { add_card(name_, description_, column_, data) }
// //                 // success: (data) => { alert(data) }
// //             })
// //         }
// //     })
// //     t_check = !t_check;
// //     menu_card.css("display", "flex");
// // })

// // // $(function () {
// // //     $(".add_t").on('click', (e) => {
// // //         let nameCol = $(e.target).parent().attr("id");
// // //         if (!t_check) {
// // //             $('.shtora').css("display", "fixed");
// // //             menu_card.find('input[name=column]').val(nameCol[nameCol.length - 1])
// // //         }
// // //         else menu_card.trigger('reset');
// // //         t_check = !t_check;
// // //     })
// // // })


// // // show_card();


