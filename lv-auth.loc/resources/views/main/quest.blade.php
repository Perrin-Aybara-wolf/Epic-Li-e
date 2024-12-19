@extends('layouts.main')

@section('css_card', `<link rel="stylesheet" href="{{asset('css/card.css')}}" />`)
@section('css_page', `<link rel="stylesheet" href="{{asset('css/main.css')}}" />`)
@section('html_card', `@include('card.card_menu')`)
@section('scripts')
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<!-- <script>
        let checkboxes = document.querySelectorAll('input[type=checkbox]');

        checkboxes.forEach(el => {
            el.style.borderRadius = '100px';
            console.log(el)
        });
    </script> -->
<!-- <script>
        $(function () {
            $('input[type=radio]').each((ind, el) =>{
                el.addEventListener('change', () => {
                    // if(el.checked)
                    console.log(el.checked);
            });
        })
    })

</script> -->

@endsection
@section('content')

<div class="main">
    <form class="search">
        <label for="s_text" class="text">Пошук</label>
        <input type="text" name="s_text" class="text" />
        <input type="button" class="search_btn" />
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
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text seria">|>0/10</p>
                    </div>
                </div>
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text seria">|>0/10</p>
                    </div>
                </div>
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text seria">|>0/10</p>
                    </div>
                </div>
            </div>
            <div class="fone">
                <img
                    src="https://s3-alpha-sig.figma.com/img/f452/dcd9/ff94535a29a14ab4b8235bc90f3e7cce?Expires=1725840000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=TU80pgDd~S8r1NXjX8RESHZe8JcwcITtNq~YYLzRFM8uPXoeTtjSjI6f0CIpQMYZRTfNm0eBX4lrAgEKAby2vENYa4tJHjeWl5tRR~R2vYJhe3iyBJT3hKv1j~vbWK81bEpAH5xbjONAii617~ZrGj46RyjunpzXlI8OA0pzEHNtdP0ILQa1yYvdRjCrUjgDs7O3GO3PSMwRWuIlayrKJ81wDDsVrX6Z7-wA875pJLNaOirEY4PUet99Ne1yjjP1vm3SAonIHmC0TKDh4YS75vZElVaLEReXF5T3eoa8EupSKQiwJ93Iw1Wx6u-Nx0vcjbJpGFffJFkXOLuitrSXcQ__" />
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
                <div crd_id="13" class="card">
                    <div class="card-date" style="display: none">{"name": 'name', "description": 'description',
                        "complexity": 0, "datestart": 'name', "name": 'name', }</div>
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <p class="text name">Text</p>
                    <p class="text description">fkdfkdfkdfkdf fdkfdkfd kfdfkdkfd fkdfkdfkdfkdf fdkfdkfd kfdfkdkfd
                        fkdfkdfkdfkdf fdkfdkfd kfdfkdkfd fkdfkdfkdfkdf fdkfdkfd kfdfkdkfd</p>
                    <p class="text seria">|>0/10</p>
                    <div class="delete"></div>
                </div>
            </div>
            <div class="fone">
                <img
                    src="https://s3-alpha-sig.figma.com/img/d739/a188/0642bd30df8ad46f44b9baa337e0ab99?Expires=1725840000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=AIllZ30swceAITjqrBV4J303dIuQeKQPDVKCbHxDLNHfE~y19RwcNQ5exJ7s~LJkbUv9FKtS~KJNGrEO7t2HkOMM9cgdX3KAs0QPupSnSnXbrcn5muSEgJ2igKKb6OgcPHVnaNzGWSxD~-cxVlYklgEbC8-NJMUa2ItdbBkgNU5lDt4csuyfYUnsQ0K3h0wl6~O0S3LGiktvcG5eQNAUuIYKzECmsNbnDz2vCvrD5KEvH5CsmwhIUpQLEqZ0Zml1vtC1Lc8qtsTOkTcg0vkwcx7kf~DH4Q2gkJa--epxbMLGGQipoxPVjIkxrkjIo7n11vDwNsN0QxwFOOQTV0Sx0g__" />
                <p class="text">Це ваші завдання.<br />Вони виконуються лише один раз. Додайте списки вашим
                    завданням, щоб збільшити нагороду</p>
            </div>
        </div>
        <div id="Zad_3" class="bar ">
            <div class="bar_head" style="flex-direction: column; height: 60px; margin-left: 25px;">
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
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text seria">Дедлайн</p>
                    </div>
                </div>
                <div class="card">
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text seria">Дедлайн</p>
                    </div>
                </div>
            </div>
            <div class="fone">
                <img
                    src="https://s3-alpha-sig.figma.com/img/f452/dcd9/ff94535a29a14ab4b8235bc90f3e7cce?Expires=1725840000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=TU80pgDd~S8r1NXjX8RESHZe8JcwcITtNq~YYLzRFM8uPXoeTtjSjI6f0CIpQMYZRTfNm0eBX4lrAgEKAby2vENYa4tJHjeWl5tRR~R2vYJhe3iyBJT3hKv1j~vbWK81bEpAH5xbjONAii617~ZrGj46RyjunpzXlI8OA0pzEHNtdP0ILQa1yYvdRjCrUjgDs7O3GO3PSMwRWuIlayrKJ81wDDsVrX6Z7-wA875pJLNaOirEY4PUet99Ne1yjjP1vm3SAonIHmC0TKDh4YS75vZElVaLEReXF5T3eoa8EupSKQiwJ93Iw1Wx6u-Nx0vcjbJpGFffJFkXOLuitrSXcQ__" />
                <p class="text">Це ваші завдання.<br />Вони виконуються лише один раз. Додайте списки вашим
                    завданням, щоб збільшити нагороду</p>
            </div>
        </div>
    </div>
</div>

<div class="main">
    <div class="reward_bar">
        <div class="reward_r">
            <h2 class="text">Нагороди</h2>
            <button class="add_tsk">
                <div class="plus"></div>
                <p class="text" style="color: #275154;">Додати нагороду</p>
            </button>
            <div class="table_tsk">
                <div class="card_rew">
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text seria">Дедлайн</p>
                    </div>
                    <form class="side">
                        <input type="checkbox" />
                    </form>
                </div>
                <div class="card_rew">
                    <div class="view_crd">
                        <p class="text name">Text</p>
                        <p class="text name">Text</p>
                    </div>
                    <div class="side">
                        <img src="https://s3-alpha-sig.figma.com/img/5544/b40c/1b8ef926ef57e900fb7e677cfc080ccd?Expires=1725840000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=eusa23ZRltmuDMA6tPqLGoqVOVdkJgwycTz85DqZwYogOwvSRI4IadHZiVori119s12wXRZbkce4I-p21RUZXo~p6crbihwl22qwlgmiRR-9dWawJpikPGED58CsDhOAQSXYvVjBh0HJ~PcFXpgvJ88wOrLBV~dyaK72pKoZaU-~q0FarejyscX1yJfBCMKfkBmTF-V4FQ4BZUi5R-KkRl7TKMgd3fnPfpSEfuAAAEBCYgYQ1XgIakmNrlHsyUDzz2XgOiCk0qFsgTquZLMqAUvr0pZuG8pwM9Hg9aA2RVhFsm5YeuwOw0MFSb2-5cyYD47dlT596nUpDtYai~RCSQ__"
                            style="height: 40%;" />
                        <p class="text">10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection