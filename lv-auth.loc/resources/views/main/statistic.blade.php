@extends('layouts.main')


@section('css_page')
<link rel="stylesheet" href="{{asset('css/statistic.css')}}" />
@endsection

@section('scripts')
<script src="{{asset('js/statistic.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    let link = '{{route('rozpisanie')}}';
</script>
@endsection

@section('content')

<div class="calendars-wrapper">
    <div class="calendars-container">
        <div class="calendar-container" id="prevCalendar"></div>
        <div class="calendar-container" id="currentCalendar">
            <div class="calendar-header">
                <div class="calendar-navigation">
                    <button id="prev-month">&lt;</button>
                    <h2 id="monthYear">Серпень 2024</h2>
                    <button id="next-month">&gt;</button>
                </div>
            </div>
            <div class="calendar-grid" id="calendarGrid"></div>
        </div>
        <div class="calendar-container" id="nextCalendar"></div>
    </div>
</div>

<div class="charts-container">
    <div class="chart pie-chart">
        <canvas id="pieChart"></canvas>
    </div>
    <div class="chart bar-chart">
        <canvas id="barChart"></canvas>
    </div>
</div>
@endsection