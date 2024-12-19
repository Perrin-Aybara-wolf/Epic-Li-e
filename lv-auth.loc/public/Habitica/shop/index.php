<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <script src="\Habitica\jquery-3.7.1.js"></script>

    <style>
        div {
            width: 50px;
            height: 50px;
            border: 1px dashed black;
        }

        .polka {
            width: 300px;
            height: 300px;
            display: flex;

            flex-wrap: wrap;
            justify-content: space-around;
        }

        .item {
            display: flex;
            align-content: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            flex-wrap: wrap;
        }

        img {
            width: 90%;
            height: 90%;

        }
    </style>

</head>

<body>
    <div class="polka">

        <!-- <?php
        require_once '../scripts/connect_db.php';

        $con = connection('Epic_Life');

        $result = mysqli_query($con, "SELECT * FROM `Items`");

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
        <div class="item">
            <img src="' . get_web_path($row['img_full_path']) . '"/>
            ' . $row['id'] . '
        </div>';
        }

        ?> -->

    </div>
    <button id="upload">обновить</button>
    <button id="buy">купить</button>
    <script>
        show_card();

        let btn = $("#upload");
        btn.on("click", (e) => {
            e.preventDefault();
            show_card();
        })

        // function show_card() {
        //     $.ajax("show_task.php", {
        //         method: "POST",
        //         data: { user_id: <?php echo $_SESSION['user_id'] ?> },
        //         caches: true,
        //         fail: () => { alert("всё пропало") },
        //         success: (data) => {
        //             data = JSON.parse(data);


        //             let temp = [];
        //             for (i = 1; i < 4; i++) {
        //                 let zad = $("#Zad_" + i).children().each((index, el) => {
        //                     temp[temp.length] = el.getAttribute("crd_id");
        //                 })
        //                 list_card[i - 1] = temp;
        //                 temp = [];
        //             }
        //             console.log(list_card);
        //             console.log(data);


        //             data.forEach(el => {
        //                 if (list_card[el.id].find((el_ar, index, arr) => { if (el_ar === el.id) return true; }))
        //                     return;

        //                 card = document.createElement("div");
        //                 card.setAttribute("class", "tsk");
        //                 card.setAttribute("crd_id", el.id);
        //                 card.innerHTML += "<p>Name: " + el.Name + "</p><p>Status: " + el.Description + "</p>";
        //                 $("#Zad_" + el.Column_num).append(card);
        //                 // значения должны подтягиваться из таблицы статистики, но пока там не реализован триггер, потому берём из того, что есть.
        //             });
        //         }
        //     }
        //     )
        // }


        function show_card() {
            $.ajax("show_items.php", {
                method: "POST",
                // data: { user_id: <?php echo $_SESSION['user_id'] ?> },
                caches: true,
                fail: () => { alert("всё пропало") },
                success: (data) => {
                    data = JSON.parse(data);
                    data.forEach(el => {
                        card = document.createElement("div");
                        card.setAttribute("class", "item");

                        img = document.createElement('img');
                        img.setAttribute('src', el.img_full_path.replace(new RegExp("<?php echo $_SERVER['DOCUMENT_ROOT'] ?>"), ''));
                        card.append(img);
                        card.innerHTML += "<p>Count: " + el.price_gold + "</p>";
                        $(".polka").append(card);
                    });
                }
            }
            )
        }
    </script>

</body>

</html>