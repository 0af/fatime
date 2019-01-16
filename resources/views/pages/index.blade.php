@extends('layout.layout')
@section('content')
    <div class="container mt-5 pb-5">
        <div class="p-4 mt-5 box-default position-relative">
            <religious-prayers-component></religious-prayers-component>
        </div>
        <div class="mt-5 box-default" id="main-calendar-container">
            <calendar-component year-jalali="{{ $data['currentJalaliYear'] }}"
                                month-jalali="{{ $data['currentJalaliMonth'] }}"
                                >

            </calendar-component>
        </div>
        <div class="p-4 mt-5 box-default" id="religious-prayers">
            <convert-date-component year-jalali="{{ $data['currentJalaliYear'] }}"
                    current-day="{{ (int)$data['currentDayNumber'] }}"
                    year-leep="{{ $data['yearIsLeep'] }}"
                    current-jalali="{{ $data['currentDate'] }}"
                    current-gregorian="{{ $data['currentGDate'] }}"
                    current-gregorian-date="{{ $data['currentGregorianDateStr'] }}"
                    current-ghamari-date="{{ $data['currentGhamariDate'] }}"
                    current-ghamari="{{ $data['currentGhDate'] }}"
                    current-jalali-date="{{ $data['currentJalaliDate'] }}"
                    current-p-symbol="{{ $data['currentPSymbol'] }}"
                    current-month="{{ $data['currentMonthNumber'] }}" >
            </convert-date-component>
        </div>
    </div>
    <check-time-component v-if="modalTimeUnCurrect" time="{{ $data['currentDateForHours'] }}"
                     message="تاریخ سیستم شما بروز نمیباشد."
                     @close="modalTimeUnCurrect = false"
    ></check-time-component>
@endsection