<template>
  <div id="convertDate">
    <form>
      <div class="form-row">
        <div class="col-md-3 mb-3 text-right">
          <div class="form-group">
            <label for="convertType">نوع تبدیل</label>
            <select class="form-control" id="convertType" v-model="convertType" :change="changeConvertType">
              <option value="1">شمسی به میلادی و قمری</option>
              <option value="2">میلادی به شمسی و قمری</option>
              <option value="3">قمری به شمسی و میلادی</option>
            </select>
          </div>
        </div>
        <div class="col-md-1 mb-3 text-right">
          <div class="form-group">
            <label for="dayList">روز</label>
            <select class="form-control" id="dayList" v-model="dayForConvert">
              <option v-for="day in dayList" v-text="day"></option>
            </select>
          </div>
        </div>
        <div class="col-md-2 mb-3 text-right">
          <div class="form-group">
            <label for="monthList">ماه</label>
            <select class="form-control" id="monthList" v-model="monthForConvert">
              <option v-for="month in monthList" v-text="month.monthName" :value="month.monthValue"></option>
            </select>
          </div>
        </div>
        <div class="col-md-2 mb-3 text-right">
          <label for="validationServer03">سال</label>
          <input type="text" class="form-control" id="validationServer03" placeholder="سال" v-model="yearForConvert" required>
        </div>
        <div class="col-md-2 mb-3 text-right pt-4 mr-5">
          <button type="button" class="btn bg-default text-white mt-2 pr-5 pl-5" @click="convertDates">تبدیل</button>
        </div>
      </div>

    </form>
    <div class="row p-3">
      <div class="col p-3 ml-1 mr-1 border rounded text-center bg-cst-light">
        <h5> شمسی: </h5>
        <span class="d-block" v-text="jalaliDateShow"></span>
        <span class="d-block" v-text="jalaliShow"></span>
      </div>
      <div class="col p-3 ml-1 mr-1 border rounded text-center bg-cst-light">
        <h5>  قمری: </h5>
        <span class="d-block" v-text="ghamariDateShow"></span>
        <span class="d-block" v-text="ghamariShow"></span>
      </div>
      <div class="col p-3 ml-1 mr-1 border rounded text-center bg-cst-light">
        <h5>  میلادی: </h5>
        <span class="d-block" v-text="gregorianDateShow"></span>
        <span class="d-block" v-text="gregorianShow"></span>
      </div>
      <div class="col p-3 ml-1 mr-1 border rounded text-center bg-cst-light">
        <span class="d-block"><b> برج فلکی : ‌</b><i v-text="pSymbol"></i></span>
        <div class="d-block">
          <b>فاصله زمانی (سن) :‌</b>
        </div>
        <div class="d-block">
          <span v-if="distanceYear != 0">{{ distanceYear }}سال </span>
          <span v-if="distanceMonth != 0">{{ distanceMonth }}ماه </span>
          <span v-if="showDistanceDay">{{ distanceDay }} روز </span>
          <span v-if="distanceState == 1"> آینده</span>
          <span v-if="distanceState == -1"> گذشته</span>
        </div>
        <span class="d-block" v-if="leep == 1"> سال {{ yearShamsi }} کبیسه است</span>
        <span class="d-block" v-if="leep == 0"> سال {{ yearShamsi }} کبیسه نیست.</span>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "ConvertDateComponent",
    props: [
      "currentPSymbol",
      "currentGregorian",
      "currentGregorianDate",
      "currentGhamari",
      "currentGhamariDate",
      "currentJalali",
      "yearJalali",
      "currentJalaliDate",
      "currentDay",
      "currentMonth",
      "yearLeep",

    ],
    data(){
      return({
        convertType : 1,
        yearForConvert : this.yearJalali,
        dayList : [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
        monthJalali : [
          {
            monthName: "فروردین - ماه اول",
            monthValue : 1
          },
          {
            monthName: "اردیبهشت - ماه دوم",
            monthValue : 2
          },
          {
            monthName: "خرداد - ماه سوم",
            monthValue : 3
          },
          {
            monthName: "تیر - ماه چهارم",
            monthValue : 4
          },
          {
            monthName: "مرداد - ماه پنجم",
            monthValue : 5
          },
          {
            monthName: "شهریور - ماه ششم",
            monthValue : 6
          },
          {
            monthName: "مهر - ماه هفتم",
            monthValue : 7
          },
          {
            monthName: "آبان - ماه هشتم",
            monthValue : 8
          },
          {
            monthName: "آذر - ماه نهم",
            monthValue : 9
          },
          {
            monthName: "دی - ماه دهم",
            monthValue : 10
          },
          {
            monthName: "بهمن - ماه یازدهم",
            monthValue : 11
          },
          {
            monthName: "اسفند - ماه دوازدهم",
            monthValue : 12
          },
        ],
        monthGhamari : [
          {
            monthName: "محرم - ماه اول",
            monthValue : 1
          },
          {
            monthName: "صفر - ماه دوم",
            monthValue : 2
          },
          {
            monthName: "ربیع الاول - ماه سوم",
            monthValue : 3
          },
          {
            monthName: "ربیع الثانی - ماه چهارم",
            monthValue : 4
          },
          {
            monthName: "جمادی الاول - ماه پنجم",
            monthValue : 5
          },
          {
            monthName: "جمادی الثانیه - ماه ششم",
            monthValue : 6
          },
          {
            monthName: "رجب - ماه هفتم",
            monthValue : 7
          },
          {
            monthName: "شعبان - ماه هشتم",
            monthValue : 8
          },
          {
            monthName: "رمضان - ماه نهم",
            monthValue : 9
          },
          {
            monthName: "شوال - ماه دهم",
            monthValue : 10
          },
          {
            monthName: "ذوالقعده - ماه یازدهم",
            monthValue : 11
          },
          {
            monthName: "ذوالحجه - ماه دوازدهم",
            monthValue : 12
          },
        ],
        monthGregorian : [
          {
            monthName: "January - ماه اول",
            monthValue : 1
          },
          {
            monthName: "February - ماه دوم",
            monthValue : 2
          },
          {
            monthName: "March - ماه سوم",
            monthValue : 3
          },
          {
            monthName: "April - ماه چهارم",
            monthValue : 4
          },
          {
            monthName: "May - ماه پنجم",
            monthValue : 5
          },
          {
            monthName: "June - ماه ششم",
            monthValue : 6
          },
          {
            monthName: "July - ماه هفتم",
            monthValue : 7
          },
          {
            monthName: "August - ماه هشتم",
            monthValue : 8
          },
          {
            monthName: "September - ماه نهم",
            monthValue : 9
          },
          {
            monthName: "October - ماه دهم",
            monthValue : 10
          },
          {
            monthName: "November - ماه یازدهم",
            monthValue : 11
          },
          {
            monthName: "December - ماه دوازدهم",
            monthValue : 12
          },
        ],
        monthList : [],
        ghamariDateShow : this.currentGhamariDate,
        ghamariShow : this.currentGhamari,
        gregorianDateShow : this.currentGregorianDate,
        gregorianShow : this.currentGregorian,
        jalaliDateShow : this.currentJalaliDate,
        jalaliShow : this.currentJalali,
        yearShamsi : this.yearJalali,
        pSymbol : this.currentPSymbol,
        leep : this.yearLeep,
        distanceState: 0,
        distanceYear: 0,
        distanceMonth: 0,
        distanceDay: 0,
      })
    },computed:{
      changeConvertType(){
        if(this.convertType ==2){
          this.monthList = this.monthGregorian;
          this.monthForConvert = 1;
          this.dayForConvert = 1;
        }else if (this.convertType ==3) {
          this.monthList = this.monthGhamari;
          this.monthForConvert = 1;
          this.dayForConvert = 1;
        }else{
          this.monthList = this.monthJalali;
          this.monthForConvert = this.currentMonth;
          this.dayForConvert = this.currentDay;
        }
      },showDistanceDay(){
        return (this.distanceDay != 0 || this.distanceYear == 0 && this.distanceMonth == 0 && this.distanceDay == 0) ? true : false;
      }
    },
    methods:{
      convertDates() {
        axios.get('/api/convertDate/' + this.convertType + '/' + this.yearForConvert + '/' + this.monthForConvert + '/' + this.dayForConvert )
          .then(response => {
            this.pSymbol = response.data.pSymbol;
            this.gregorianDateShow = response.data.gregorian;
            this.gregorianShow = response.data.gregorianDate;
            this.ghamariDateShow = response.data.ghamari;
            this.ghamariShow = response.data.ghamariDate;
            this.jalaliDateShow = response.data.shamsi;
            this.jalaliShow = response.data.shamsiDate;
            this.leep = response.data.yearLeep;
            this.yearShamsi = response.data.yearShamsi;
            this.distanceState = response.data.distanceState;
            this.distanceYear = response.data.distanceYear;
            this.distanceMonth = response.data.distanceMonth;
            this.distanceDay = response.data.distanceDay;
          });
      }
    }
  }
</script>

<style scoped>

</style>