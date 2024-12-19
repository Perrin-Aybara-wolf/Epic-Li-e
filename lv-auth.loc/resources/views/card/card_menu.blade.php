<div class="card_body">
    <div
        style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; height: var(--k_card)">
        <h2>Створити звичку</h2>
        <div class="x"
            style="align-self:center; background-color: black; width: calc(var(--k_card)*0.4); height: calc(var(--k_card)*0.4);">
        </div>
    </div>
    <form class="form-crd" id="form-crd" method="POST">
        @csrf
        <div>
            <label for="name">Назва</label>
            <input name="name" id="name" type="text" placeholder="Додайте назву" />
        </div>
        <div style="height: var(--k_card) ;">
            <label for="description">Нотатки</label>
            <textarea name="description" id="description" placeholder="Додайте нотатки"></textarea>
        </div>
        <div>
            <label for="complexity">Сложность</label>
            <select id="complexity" name="complexity">
                <option value="1">Легко</option>
                <option value="2">Сложно</option>
                <option value="3">Невероятно!</option>
            </select>
        </div>
        <div class="grid_grp">
            <p>Початок</p>
            <p style="justify-self: flex-end;">Конец</p>
            <input id="stime_tsk" name="timestart" type="time" value="" />
            <input id="ftime_tsk" name="timefinish" type="time" value="" />
            <input id="sdate_tsk" name="datestart" type="date" value="" />
            <input id="fdate_tsk" name="datefinish" type="date" value="" />
        </div>
        <div>
            <label for="rep_int">Повторювати кожны</label>
            <div style="display: flex; gap:calc(var(--k_card)/10); width: 100%; height: calc(var(--k_card)/2.23)">
                <input style="flex: 3" id="rep_int" name="rep_int" type="number" value="" min="0" />
                <select style="flex: 2;" id="sel_rep_int" name="sel_rep_int">
                    <option value="1">День</option>
                    <option value="2">Неделя</option>
                    <option value="3">Год</option>
                </select>
            </div>
        </div>
        <div style="display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            ">
            <label for="rep_cal">Повторювати в</label>
            <div id="rep_cal">
                <div>
                    НД
                    <input style="display: none;" day="1" type="checkbox" />
                </div>
                <div>
                    ПН
                    <input style="display: none;" day="2" type="checkbox" />
                </div>
                <div>
                    ВТ
                    <input style="display: none;" day="3" type="checkbox" />
                </div>
                <div>
                    СР
                    <input style="display: none;" day="4" type="checkbox" />
                </div>
                <div>
                    ЧТ
                    <input style="display: none;" day="5" type="checkbox" />
                </div>
                <div>
                    ПТ
                    <input style="display: none;" day="6" type="checkbox" />
                </div>
                <div>
                    СБ
                    <input style="display: none;" day="7" type="checkbox" />
                </div>
            </div>
        </div>
        <div style="display: flex; flex-direction: row; height: 45px; margin: 15px auto; gap: 14px;">
            <select id="grp_tsk" name="grp_tsk">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->Name}}</option>
                @endforeach
            </select>
            <div style="display: flex; align-items: center; min-width: 185px; border: 0.1px solid #0000003d; border-radius: 10px; height: 100%; 
    box-shadow: 2px 4px 5px 1px #00000030;">
                <span style="color: #275154; font-size: 20px; padding-left: 10px; padding-right: 10px;">Оберіть
                    колір</span>
                <input type="color" id="color"
                    style="width: 20px; height: 20px; border: none; padding: 0; margin-left: auto; cursor: pointer; margin-right: 19px; box-shadow: 0 0;">
            </div>
        </div>
        <div
            style="display: flex; flex-direction: row; gap: 10px; align-self: flex-end; height: calc(var(--k_card)/100*41); width: calc((var(--k_card)/100*140*2) + 10px);">
            <input style="color: #FFFFFF; background: #828282; text-align: center;" type="reset" value="Скасувати" />
            <input style="color: #FFFFFF; background: #437484; text-align: center;" type="submit" value="Редагувати" />
        </div>
    </form>
</div>