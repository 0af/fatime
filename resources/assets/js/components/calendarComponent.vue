<template>
  <div class="row" id="calendar-section">
    <div class="col-md-5 p-5 box-default">
      <div id="calendar-main">
        <div class="row mb-2 text-center">
          <div class="col-md-12">
            <span class="fa fa-arrow-circle-down text-dark" @click="changeMonthDialog"></span>
            <div id="month-dialog" :style="{display: monthDialog}">
              <div class="row" v-for="i in Math.ceil(jalaliMonthNames.length / 3)">
                <div class="col-md-4 col-sm-12 mt-2 mb-2 cursor-pointer" v-for="month in jalaliMonthNames.slice((i - 1) * 3, i * 3)">
                  <span @click="showMonth(month.id)">{{ toPersianNum(month.id) + ". " + month.name}}</span>
                </div>
              </div>
            </div>
            <h5 class="d-inline">{{ currentJalaliMonthName }} ماه  {{ toPersianNum(currentJalaliYear) }}</h5>
            <span class="fa fa-arrow-circle-down text-dark" @click="changeYearDialog"></span>
            <div id="year-dialog" :style="{display: yearDialog}">
              <div class="row">
                <div class="col-md-9">
                  <input v-model="currentYearJalali" type="number" class="form-control"></div>
                <div class="col-md-3">
                  <button type="button" class="btn btn-success" @click="showYear">برو</button></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col text-right cursor-pointer" @click="pervMonth">            ماه قبل<span class="fa fa-arrow-right"></span></div>
          <div class="col text-center">
            <h6>{{ currentGregorianMonthName }} {{ currentGregorianYear }}</h6>
          </div>
          <div class="col cursor-pointer" @click="nextMonth"> ماه بعد <span class="fa fa-arrow-left"></span></div>
        </div>
        <div class="row text-center">
          <div class="col-md-12"><h6>{{ currentGhamariMonthName }} - {{ toPersianNum(currentGhamariYear) }}</h6></div>
        </div>
        <div id="calendar-main-title" class="row mr-0 ml-0 text-center bg-default text-light">
          <div class="col d-inline p-1" v-for="day in daysOfWeek" v-text="day"></div>
        </div>
        <div id="calendar-main-body" class="text-center" >
            <div class="row mr-0 ml-0 mt-2" v-for="i in Math.ceil(daysOfMonth.length / 7)">
              <div v-for="(day,index) in daysOfMonth.slice((i - 1) * 7, i * 7)" :class="['col', 'mr-1',
            'calendar-cell', 'pr-0 pl-0', isLastDayOfWeek(index) ? 'last-day-of-week': ''
            , (day.currentDay == true) ? 'border border-3 border-default': '', 'rounded'
            , (day.notCurrentMonth == true) ? 'other-month-day': '', (holiday.indexOf(day.dayJalali) < 0? '': 'last-day-of-week')]">
                <span v-text="toPersianNum(day.dayJalali)" class="align-middle d-block mt-1 selected-calendar"></span>
                <span v-text="day.dayGregorian" class="align-bottom calendar-gregorian-date ml-2"></span>
                <span v-text="toPersianNum(day.dayGhamari)" class="align-bottom calendar-arabic-date"></span>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="order-2 col-md-7 text-right pt-3 pr-4">
      <div class="pr-1">
        <h3 class="text-default ">مناسبت های ماه</h3>
        <hr>
      </div>
      <div id="event-group" class="pr-1 pt-1">
        <div v-for="event in eventOfMonth"
             :class="['event-item mt-2', checkEvent(event)]">
          <b v-text="event.dayJalali"></b>
          <b v-text="jalaliMonthNames[event.monthJalali-1].name"></b>
          <span class="cursor-pointer event-item-title">
            {{event.title}}
            <div id="event-details" class="col-md-10 box-default p-3 position-absolute">
            <div class="row" v-if="event.image !== null">
              <div class="col-md-12 text-center mb-2">
                <img :src="event.image" :alt="event.title" class="w-50">
              </div>
            </div>
            <span v-text="event.body" class="text-dark"></span>
            </div>
          </span>
          <span v-if="event.dayGregorian">[ {{ event.dayGregorian + " " + jalaliMonthNames[event.monthGregorian-1].gregorianName + " "  }} ]</span>
          <span v-if="event.dayGhamari">[ {{ event.dayGhamari + " " +jalaliMonthNames[event.monthGhamari-1].ghamariName}} ]</span>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "calendarComponent",
    props: [
      "monthJalali",
      "yearJalali",
    ],
    data(){
      return({
        currentJalaliMonthName : '',
        currentGregorianMonthName : '',
        currentGhamariMonthName : '',
        currentGhamariYear: '',
        currentGregorianYear: '',
        currentJalaliYear: '',
        monthDialog: 'none',
        yearDialog: 'none',
        jalaliMonthNames: [
          {
            id: 1,
            name: "فروردین",
            gregorianName: "January",
            ghamariName: "محرم"
          },
          {
            id: 2,
            name: "اردیبهشت",
            gregorianName: "February",
            ghamariName: "صفر"
          },
          {
            id: 3,
            name: "خرداد",
            gregorianName: "March",
            ghamariName: "ربیع‌الاول"
          },
          {
            id: 4,
            name: "تیر",
            gregorianName: "April",
            ghamariName: "ربیع‌الثانی"
          },
          {
            id: 5,
            name: "مرداد",
            gregorianName: "May",
            ghamariName: "جمادی‌الاول"
          },
          {
            id: 6,
            name: "شهریور",
            gregorianName: "June",
            ghamariName: "جمادی‌الثانی"
          },
          {
            id: 7,
            name: "مهر",
            gregorianName: "July",
            ghamariName: "رجب"
          },
          {
            id: 8,
            name: "آبان",
            gregorianName: "August",
            ghamariName: "شعبان"
          },
          {
            id: 9,
            name: "آذر",
            gregorianName: "September",
            ghamariName: "رمضان"
          },
          {
            id: 10,
            name: "دی",
            gregorianName: "October",
            ghamariName: "شوال"
          },
          {
            id: 11,
            name: "بهمن",
            gregorianName: "November",
            ghamariName: "ذیقعده"
          },
          {
            id: 12,
            name: "اسفند",
            gregorianName: "December",
            ghamariName: "ذیحجه"
          }
        ],
        daysOfWeek:[
          'ش',
          'ی',
          'د',
          'س',
          'چ',
          'پ',
          'ج',
        ],
        daysOfMonth: [],
        currentMonthJalali : 1,
        currentYearJalali : 1,
        eventOfMonth:[],
        holiday: [],
      })
    },
    methods:{
      isLastDayOfWeek(index){
        if (index != 0 && index / 6 == 1) {
          return true;
        }
        return false;
      },
      toPersianNum( num, dontTrim ) {
        let i = 0;
        dontTrim = dontTrim || false;
        num = dontTrim ? num.toString() : num.toString().trim();
        let len = num.length;
        let res = '';
        let pos;
        let persianNumbers = typeof persianNumber == 'undefined' ?
          ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] : persianNumbers;
        for (; i < len; i++)
          if (( pos = persianNumbers[num.charAt(i)] ))
            res += pos;
          else
            res += num.charAt(i);
        return res;
      },
      changeMonthDialog() {
        if (this.monthDialog == "none") {
          this.monthDialog = "block";
        } else {
          this.monthDialog = "none";
        }
      },
      showMonth(month) {
        this.monthJalali = month;
        this.currentMonthJalali = month;
        this.getCalendar(this.currentYearJalali, this.monthJalali);
      },
      nextMonth() {
        this.currentMonthJalali++;
        if (this.currentMonthJalali > 12) {
          this.currentYearJalali++;
          this.currentMonthJalali=1;
        }
        this.getCalendar(this.currentYearJalali, this.currentMonthJalali);
      },
      pervMonth(){
        this.currentMonthJalali--;
        if (this.currentMonthJalali < 1) {
          this.currentYearJalali--;
          this.currentMonthJalali=12;
        }
        this.getCalendar(this.currentYearJalali, this.currentMonthJalali)
      },
      getCalendar(year, month) {
        axios.get('/api/getCalendar/' + year + '/' + month )
          .then(response => {
            this.daysOfMonth = response.data.calendar;
            this.currentJalaliMonthName = response.data.currentJalaliMonthName;
            this.currentGregorianMonthName = response.data.currentGregorianMonthName;
            this.currentGhamariMonthName = response.data.currentGhamariMonthName;
            this.currentGhamariYear = response.data.currentGhamariYear;
            this.currentGregorianYear = response.data.currentGregorianYear;
            this.currentJalaliYear = response.data.currentJalaliYear;
            this.renderEventList(response.data.event);
          });
        if (this.monthDialog == "block") {
          this.monthDialog = "none";
        }
        if (this.yearDialog == "block") {
          this.yearDialog = "none";
        }
      },
      renderEventList(events) {
        let cstDayofMonth = this.daysOfMonth;
        let eventOut = [];
        let holidayOut = [];
        for(let dayItem in cstDayofMonth){
          for (let ghamariItems in events.ghamari) {
            for (let ghamariItem in events.ghamari[ghamariItems]) {
              if (cstDayofMonth[dayItem].notCurrentMonth == undefined) {
                if (cstDayofMonth[dayItem].dayGhamari == events.ghamari[ghamariItems][ghamariItem].day && cstDayofMonth[dayItem].monthGhamari == events.ghamari[ghamariItems][ghamariItem].month) {
                  let cstTmpVal = {
                    monthJalali: cstDayofMonth[dayItem].monthJalali,
                    dayJalali: cstDayofMonth[dayItem].dayJalali,
                    title: events.ghamari[ghamariItems][ghamariItem].title,
                    body: events.ghamari[ghamariItems][ghamariItem].body,
                    image: events.ghamari[ghamariItems][ghamariItem].image,
                    isHoliday: events.ghamari[ghamariItems][ghamariItem].isHoliday,
                    monthGhamari: cstDayofMonth[dayItem].monthGhamari,
                    dayGhamari: cstDayofMonth[dayItem].dayGhamari
                  };
                  if (events.ghamari[ghamariItems][ghamariItem].isHoliday) {
                    holidayOut.push(cstDayofMonth[dayItem].dayJalali);
                  }
                  eventOut.push(cstTmpVal);
                }
              }
            }
          }
          for (let jalaliItems in events.jalali) {
            for (let jalaliItem in events.jalali[jalaliItems]) {
              if (cstDayofMonth[dayItem].notCurrentMonth == undefined) {
                if (cstDayofMonth[dayItem].dayJalali == events.jalali[jalaliItems][jalaliItem].day
                  && cstDayofMonth[dayItem].monthJalali == events.jalali[jalaliItems][jalaliItem].month) {
                  let cstTmpVal = {
                    monthJalali: cstDayofMonth[dayItem].monthJalali,
                    dayJalali: cstDayofMonth[dayItem].dayJalali,
                    title: events.jalali[jalaliItems][jalaliItem].title,
                    body: events.jalali[jalaliItems][jalaliItem].body,
                    image: events.jalali[jalaliItems][jalaliItem].image,
                    isHoliday: events.jalali[jalaliItems][jalaliItem].isHoliday
                  };
                  if (events.jalali[jalaliItems][jalaliItem].isHoliday) {
                    holidayOut.push(cstDayofMonth[dayItem].dayJalali);
                  }
                  eventOut.push(cstTmpVal);
                }
              }
            }
          }
          for (let gregorianItems in events.gregorian) {
            for (let gregorianItem in events.gregorian[gregorianItems]) {
              if (cstDayofMonth[dayItem].notCurrentMonth == undefined) {
                if (cstDayofMonth[dayItem].dayGregorian == events.gregorian[gregorianItems][gregorianItem].day
                  && cstDayofMonth[dayItem].monthGregorian == events.gregorian[gregorianItems][gregorianItem].month) {
                  let cstTmpVal = {
                    monthJalali: cstDayofMonth[dayItem].monthJalali,
                    dayJalali: cstDayofMonth[dayItem].dayJalali,
                    title: events.gregorian[gregorianItems][gregorianItem].title,
                    body: events.gregorian[gregorianItems][gregorianItem].body,
                    isHoliday: events.gregorian[gregorianItems][gregorianItem].isHoliday,
                    monthGregorian: cstDayofMonth[dayItem].monthGregorian,
                    dayGregorian: cstDayofMonth[dayItem].dayGregorian
                  };
                  if (events.gregorian[gregorianItems][gregorianItem].isHoliday) {
                    holidayOut.push(cstDayofMonth[dayItem].dayJalali);
                  }
                  eventOut.push(cstTmpVal);
                }
              }
            }
          }
        }
        eventOut.sort(function (a, b) {
          if (a.dayJalali < b.dayJalali)
            return -1;
          if (a.dayJalali > b.dayJalali)
            return 1;
          return 0;
        });
        this.eventOfMonth = eventOut;
        this.holiday = holidayOut;
      },
      changeYearDialog() {
        if (this.yearDialog == "none") {
          this.yearDialog = "block";
        } else {
          this.yearDialog = "none";
        }
      },
      showYear() {
        this.getCalendar(this.currentYearJalali, this.currentMonthJalali);
      },
      checkEvent(event) {
        if (this.holiday.indexOf(event.dayJalali) < 0 || event.isHoliday === null) {
          return '';
        }
        return 'text-danger';
      }
    },
    mounted(){
      this.currentMonthJalali = this.monthJalali;
      this.currentYearJalali = this.yearJalali;
      this.getCalendar(this.yearJalali, this.monthJalali);
    }
  }
</script>

<style scoped>
  .row {
    margin-left: 0 !important;
    margin-right: 0 !important;
  }
  #month-dialog {
    position: absolute;
    z-index: 999;
    background-color: white;
    border: 1px solid #4bc;
    padding: 7px 10px;
    right: 0;
    width: 100%;
    text-align: right;
    color: #000;
    font-size: .8em;
    box-shadow: 0 1px 6px rgba(0,0,0,.12),0 1px 4px rgba(0,0,0,.24);
  }
  #year-dialog {
    position: absolute;
    z-index: 999;
    background-color: white;
    border: 1px solid #4bc;
    padding: 20px;
    right: 12.5%;
    width: 75%;
    text-align: right;
    color: #000;
    font-size: .8em;
    box-shadow: 0 1px 6px rgba(0,0,0,.12),0 1px 4px rgba(0,0,0,.24);
  }
</style>