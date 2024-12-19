$(function () {

    // Получение элементов для календарей
    const currentCalendarGrid = document.getElementById('calendarGrid');
    const monthYear = document.getElementById('monthYear');
    let dateNow = new Date();
    dateNow.setHours(0, 0, 0, 0);

    // Текущий месяц и год
    let currentMonth = dateNow.getMonth();
    let currentYear = dateNow.getFullYear();

    function renderCalendar(month, year, calendarGrid) {
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        calendarGrid.innerHTML = '';

        // Создаем заголовки дней недели
        const daysOfWeek = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'];
        daysOfWeek.forEach(day => {
            const dayHeader = document.createElement('div');
            dayHeader.textContent = day;
            dayHeader.classList.add('day_week');
            calendarGrid.appendChild(dayHeader);
        });

        // Пустые ячейки перед началом месяца
        for (let i = 0; i < (new Date(year, month, 1).getDay() + 6) % 7; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.classList.add('empty');
            calendarGrid.appendChild(emptyCell);
        }

        // Ячейки с днями месяца
        for (let day = 1; day <= daysInMonth; day++) {
            let dayCell = document.createElement('div');
            let link_day = document.createElement('a');
            dayCell.classList.add('days_month');
            dayCell.textContent = day;
            link_day.setAttribute('href', link+`?date=${currentYear}-${currentMonth+1}-${day}`)

            if (dateNow.getTime() === new Date(year, month, day, 0, 0, 0, 0).getTime()) {
                console.log('day: ' + day)
                dayCell.classList.add('curr_day');

            }
            link_day.append(dayCell);
            calendarGrid.appendChild(link_day);
        }

        const monthNames = ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'];
        monthYear.textContent = `${monthNames[month]} ${year}`;

        // $('#calendar-grid>days_month').each(())
    }

    function updateCalendar() {
        renderCalendar(currentMonth, currentYear, currentCalendarGrid);
    }

    document.getElementById('prev-month').addEventListener('click', () => {
        currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        currentYear = currentMonth === 11 ? currentYear - 1 : currentYear;
        updateCalendar();
    });

    document.getElementById('next-month').addEventListener('click', () => {
        currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
        currentYear = currentMonth === 0 ? currentYear + 1 : currentYear;
        updateCalendar();
    });

    // Инициализация календаря
    updateCalendar();


    // Chart.js для графиков
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const barCtx = document.getElementById('barChart').getContext('2d');

    // Pie Chart
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Їжа', 'Зустрічі та прогулянки', 'Навчання', 'Спорт', 'Ігри', 'Сон'],
            datasets: [{
                label: 'Категорії',
                data: [25, 25, 12.5, 8.5, 4, 25],
                backgroundColor: ['#46A2A2', '#4FB0C6', '#3E7070', '#558282', '#265656', '#193939'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Bar Chart
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Їжа', 'Зустрічі та прогулянки', 'Навчання', 'Спорт', 'Ігри', 'Сон'],
            datasets: [{
                label: 'Часы',
                data: [3, 2, 3, 4, 1, 7],
                backgroundColor: '#4FB0C6',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});