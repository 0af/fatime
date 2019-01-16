
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./bootstrap/bootstrap.min');
require('./jquery-3.2.1.slim.min.js');
import axios from 'axios';
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('check-time-component', require('./components/checkTimeModal.vue'));
Vue.component('calendar-component', require('./components/calendarComponent.vue'));
Vue.component('religious-prayers-component', require('./components/religiousPrayersComponent.vue'));
Vue.component('convert-date-component', require('./components/ConvertDateComponent.vue'));
const appInstance = new Vue({
  el: '#app',
  data: {
    intervalid1: '',
    digih: digih,
    digim: digim,
    digis: digis,
    currentDateForHours: currentDateForHours,
    modalTimeUnCurrect: false,
    alert: false,
    state : [
      {
        "stateId": 1,
        "stateName": "آذربایجان شرقی",
        "city": [
          {
            "cityName": "اسکو",
            "x": 46.12,
            "y": 37.92,
            "Key": "207170"
          },
          {
            "cityName": "اهر",
            "x": 47.07,
            "y": 38.47,
            "Key": "207163"
          },
          {
            "cityName": "آبش احمد",
            "x": 47.32,
            "y": 39.04,
            "Key": "206973"
          },
          {
            "cityName": "باسمنج",
            "x": 46.47,
            "y": 37.99,
            "Key": "207190"
          },
          {
            "cityName": "بناب",
            "x": 46.07,
            "y": 37.35,
            "Key": "207166"
          },
          {
            "cityName": "تسوج",
            "x": 45.37,
            "y": 38.31,
            "Key": "207274"
          },
          {
            "cityName": "جلفا",
            "x": 45.64,
            "y": 38.93,
            "Key": "207213"
          },
          {
            "cityName": "خامنه",
            "x": 45.63,
            "y": 38.19,
            "Key": "207291"
          },
          {
            "cityName": "خسروشهر",
            "x": 46.05,
            "y": 37.95,
            "Key": "207268"
          },
          {
            "cityName": "خواجه",
            "x": 46.59,
            "y": 38.15,
            "Key": "207303"
          },
          {
            "cityName": "زنوز",
            "x": 45.83,
            "y": 38.59,
            "Key": "207279"
          },
          {
            "cityName": "سراب",
            "x": 47.54,
            "y": 37.94,
            "Key": "207171"
          },
          {
            "cityName": "سردرود",
            "x": 46.15,
            "y": 38.03,
            "Key": "207160"
          },
          {
            "cityName": "شبستر",
            "x": 45.7,
            "y": 38.18,
            "Key": "207294"
          },
          {
            "cityName": "مراغه",
            "x": 46.23,
            "y": 37.39,
            "Key": "207173"
          },
          {
            "cityName": "مرند",
            "x": 45.77,
            "y": 38.43,
            "Key": "207159"
          },
          {
            "cityName": "مهربان",
            "x": 47.13,
            "y": 38.08,
            "Key": "207271"
          },
          {
            "cityName": "ورزقان",
            "x": 46.65,
            "y": 38.51,
            "Key": "207249"
          }
        ]
      },
      {
        "stateId": 2,
        "stateName": "آذربایجان غربی",
        "city": [
          {
            "cityName": "ارومیه",
            "x": 45.06,
            "y": 37.54,
            "Key": "207147"
          },
          {
            "cityName": "اشنویه",
            "x": 45.1,
            "y": 37.04,
            "Key": "207097"
          },
          {
            "cityName": "بوکان",
            "x": 46.21,
            "y": 36.51,
            "Key": "207122"
          },
          {
            "cityName": "پیرانشهر",
            "x": 45.14,
            "y": 36.69,
            "Key": "207059"
          },
          {
            "cityName": "تکاب",
            "x": 47.11,
            "y": 36.4,
            "Key": "207136"
          },
          {
            "cityName": "چهار برج",
            "x": 45.98,
            "y": 37.13,
            "Key": "209485"
          },
          {
            "cityName": "خوی",
            "x": 44.95,
            "y": 38.52,
            "Key": "207148"
          },
          {
            "cityName": "دیزج",
            "x": 45.02,
            "y": 38.46,
            "Key": "207075"
          },
          {
            "cityName": "دیزج",
            "x": 45.02,
            "y": 38.46,
            "Key": "207125"
          },
          {
            "cityName": "سرو",
            "x": 44.65,
            "y": 37.72,
            "Key": "207113"
          },
          {
            "cityName": "سلماس",
            "x": 44.77,
            "y": 38.2,
            "Key": "207066"
          },
          {
            "cityName": "قوشچی",
            "x": 45.04,
            "y": 37.99,
            "Key": "207108"
          },
          {
            "cityName": "ماکو",
            "x": 44.49,
            "y": 39.29,
            "Key": "207063"
          },
          {
            "cityName": "مهاباد",
            "x": 45.73,
            "y": 36.77,
            "Key": "207062"
          },
          {
            "cityName": "نقده",
            "x": 45.39,
            "y": 36.95,
            "Key": "207055"
          }
        ]
      },
      {
        "stateId": 3,
        "stateName": "اردبیل",
        "city": [
          {
            "cityName": "اردبیل",
            "x": 48.29,
            "y": 38.25,
            "Key": "206976"
          },
          {
            "cityName": "پارس اباد",
            "x": 47.91,
            "y": 39.65,
            "Key": "206970"
          },
          {
            "cityName": "پارس اباد",
            "x": 47.91,
            "y": 39.65,
            "Key": "206956"
          },
          {
            "cityName": "خلخال",
            "x": 48.53,
            "y": 37.62,
            "Key": "206953"
          },
          {
            "cityName": "گرمی‌",
            "x": 48.08,
            "y": 39.01,
            "Key": "206964"
          },
          {
            "cityName": "مراد لو",
            "x": 47.75,
            "y": 38.75,
            "Key": "206967"
          },
          {
            "cityName": "مشگین شهر",
            "x": 47.67,
            "y": 38.4,
            "Key": "206974"
          },
          {
            "cityName": "نمین",
            "x": 48.48,
            "y": 38.42,
            "Key": "206968"
          },
          {
            "cityName": "نیر",
            "x": 48.01,
            "y": 38.04,
            "Key": "206969"
          },
          {
            "cityName": "هیر",
            "x": 48.5,
            "y": 38.08,
            "Key": "206952"
          }
        ]
      },
      {
        "stateId": 4,
        "stateName": "اصفهان",
        "city": [
          {
            "cityName": "اردستان",
            "x": 52.38,
            "y": 33.36,
            "Key": "208080"
          },
          {
            "cityName": "اصفهان",
            "x": 51.66,
            "y": 32.58,
            "Key": "208194"
          },
          {
            "cityName": "افوس",
            "x": 50.09,
            "y": 33.02,
            "Key": "208175"
          },
          {
            "cityName": "باغ بهادران",
            "x": 51.19,
            "y": 32.38,
            "Key": "208118"
          },
          {
            "cityName": "جندق",
            "x": 54.41,
            "y": 34.04,
            "Key": "208095"
          },
          {
            "cityName": "حنا",
            "x": 51.73,
            "y": 31.2,
            "Key": "208092"
          },
          {
            "cityName": "خوانسار",
            "x": 50.32,
            "y": 33.21,
            "Key": "207981"
          },
          {
            "cityName": "خور",
            "x": 55.08,
            "y": 33.77,
            "Key": "208039"
          },
          {
            "cityName": "خوراسگان",
            "x": 51.76,
            "y": 32.66,
            "Key": "207980"
          },
          {
            "cityName": "داران",
            "x": 50.41,
            "y": 32.99,
            "Key": "207978"
          },
          {
            "cityName": "دامنه",
            "x": 50.49,
            "y": 33.02,
            "Key": "208086"
          },
          {
            "cityName": "دستگرد",
            "x": 51.67,
            "y": 32.8,
            "Key": "208125"
          },
          {
            "cityName": "دهق",
            "x": 50.96,
            "y": 33.1,
            "Key": "208087"
          },
          {
            "cityName": "زواره",
            "x": 52.49,
            "y": 33.45,
            "Key": "208073"
          },
          {
            "cityName": "شهرضا",
            "x": 51.85,
            "y": 31.98,
            "Key": "207984"
          },
          {
            "cityName": "طالخونچه",
            "x": 51.56,
            "y": 32.26,
            "Key": "208171"
          },
          {
            "cityName": "عسگران",
            "x": 50.85,
            "y": 32.86,
            "Key": "207968"
          },
          {
            "cityName": "فلاورجان",
            "x": 51.51,
            "y": 32.56,
            "Key": "208003"
          },
          {
            "cityName": "گوگد",
            "x": 50.35,
            "y": 33.47,
            "Key": "208013"
          },
          {
            "cityName": "نطنز",
            "x": 51.92,
            "y": 33.5,
            "Key": "208165"
          },
          {
            "cityName": "نوش آباد",
            "x": 51.44,
            "y": 34.08,
            "Key": "208057"
          },
          {
            "cityName": "ورزنه",
            "x": 52.65,
            "y": 32.42,
            "Key": "208070"
          },
          {
            "cityName": "وزوان",
            "x": 51.18,
            "y": 33.42,
            "Key": "208071"
          },
          {
            "cityName": "هرند",
            "x": 52.44,
            "y": 32.56,
            "Key": "208093"
          }
        ]
      },
      {
        "stateId": 5,
        "stateName": "البرز",
        "city": [
          {
            "cityName": "اشتهارد",
            "x": 50.36,
            "y": 35.72,
            "Key": "211306"
          },
          {
            "cityName": "کرج",
            "x": 50.95,
            "y": 35.72,
            "Key": "211367"
          }
        ]
      },
      {
        "stateId": 6,
        "stateName": "ایلام",
        "city": [
          {
            "cityName": "ارکواز",
            "x": 46.6,
            "y": 33.39,
            "Key": "208966"
          },
          {
            "cityName": "ایلام",
            "x": 46.42,
            "y": 33.58,
            "Key": "208937"
          },
          {
            "cityName": "دهلران",
            "x": 47.27,
            "y": 32.69,
            "Key": "208956"
          },
          {
            "cityName": "صالح اباد",
            "x": 46.19,
            "y": 33.47,
            "Key": "208952"
          },
          {
            "cityName": "موسیان",
            "x": 47.38,
            "y": 32.52,
            "Key": "208948"
          },
          {
            "cityName": "مهران",
            "x": 46.17,
            "y": 33.12,
            "Key": "208959"
          }
        ]
      },
      {
        "stateId": 7,
        "stateName": "بوشهر",
        "city": [
          {
            "cityName": "برازجان",
            "x": 51.22,
            "y": 29.27,
            "Key": "207387"
          },
          {
            "cityName": "تنگ ارم",
            "x": 51.53,
            "y": 29.15,
            "Key": "207496"
          },
          {
            "cityName": "جم",
            "x": 52.34,
            "y": 27.82,
            "Key": "207439"
          },
          {
            "cityName": "خورموج",
            "x": 51.38,
            "y": 28.63,
            "Key": "207419"
          },
          {
            "cityName": "شنبه",
            "x": 51.76,
            "y": 28.39,
            "Key": "207493"
          }
        ]
      },
      {
        "stateId": 8,
        "stateName": "تهران",
        "city": [
          {
            "cityName": "پیشوا",
            "x": 51.72,
            "y": 35.31,
            "Key": "211318"
          },
          {
            "cityName": "تجریش",
            "x": 51.46,
            "y": 35.81,
            "Key": "211328"
          },
          {
            "cityName": "تهران",
            "x": 51.35,
            "y": 35.7,
            "Key": "210841"
          },
          {
            "cityName": "دماوند",
            "x": 52.05,
            "y": 35.69,
            "Key": "211304"
          },
          {
            "cityName": "رباط کریم",
            "x": 51.08,
            "y": 35.48,
            "Key": "211302"
          },
          {
            "cityName": "رودهن",
            "x": 51.91,
            "y": 35.74,
            "Key": "211338"
          },
          {
            "cityName": "شهریار",
            "x": 51.06,
            "y": 35.63,
            "Key": "211326"
          },
          {
            "cityName": "فشم",
            "x": 51.52,
            "y": 35.9,
            "Key": "211307"
          },
          {
            "cityName": "فیروز کوه",
            "x": 52.77,
            "y": 35.75,
            "Key": "211308"
          },
          {
            "cityName": "لواسان بزرگ",
            "x": 51.64,
            "y": 35.82,
            "Key": "211316"
          }
        ]
      },
      {
        "stateId": 9,
        "stateName": "چهارمحال و بختیاری",
        "city": [
          {
            "cityName": "بروجن",
            "x": 51.29,
            "y": 31.97,
            "Key": "207538"
          },
          {
            "cityName": "جونقان",
            "x": 50.69,
            "y": 32.14,
            "Key": "207550"
          },
          {
            "cityName": "شلمزار",
            "x": 50.82,
            "y": 32.05,
            "Key": "207573"
          },
          {
            "cityName": "فارسان",
            "x": 50.57,
            "y": 32.26,
            "Key": "207567"
          },
          {
            "cityName": "فرخ شهر",
            "x": 50.97,
            "y": 32.27,
            "Key": "207543"
          },
          {
            "cityName": "گندمان",
            "x": 51.15,
            "y": 31.86,
            "Key": "207568"
          },
          {
            "cityName": "لردگان",
            "x": 50.83,
            "y": 31.51,
            "Key": "207571"
          },
          {
            "cityName": "هفشجان",
            "x": 50.79,
            "y": 32.23,
            "Key": "207569"
          }
        ]
      },
      {
        "stateId": 10,
        "stateName": "خراسان جنوبی",
        "city": [
          {
            "cityName": "بیرجند",
            "x": 59.22,
            "y": 32.86,
            "Key": "209740"
          },
          {
            "cityName": "خوسف",
            "x": 58.89,
            "y": 32.78,
            "Key": "209805"
          },
          {
            "cityName": "نهبندان",
            "x": 60.04,
            "y": 31.54,
            "Key": "209807"
          }
        ]
      },
      {
        "stateId": 11,
        "stateName": "خراسان رضوی",
        "city": [
          {
            "cityName": "بجستان",
            "x": 58.18,
            "y": 34.52,
            "Key": "209628"
          },
          {
            "cityName": "چناران",
            "x": 59.12,
            "y": 36.64,
            "Key": "209664"
          },
          {
            "cityName": "سبزوار",
            "x": 57.68,
            "y": 36.21,
            "Key": "209738"
          },
          {
            "cityName": "سرخس",
            "x": 61.15,
            "y": 36.55,
            "Key": "209613"
          },
          {
            "cityName": "سنگان",
            "x": 60.26,
            "y": 34.4,
            "Key": "209647"
          },
          {
            "cityName": "سنگان",
            "x": 60.26,
            "y": 34.4,
            "Key": "209609"
          },
          {
            "cityName": "سنگان",
            "x": 60.26,
            "y": 34.4,
            "Key": "209607"
          },
          {
            "cityName": "قوچان",
            "x": 58.51,
            "y": 37.1,
            "Key": "209525"
          },
          {
            "cityName": "گناباد",
            "x": 58.69,
            "y": 34.35,
            "Key": "209669"
          },
          {
            "cityName": "مشهد",
            "x": 59.58,
            "y": 36.31,
            "Key": "209737"
          }
        ]
      },
      {
        "stateId": 12,
        "stateName": "خراسان شمالی",
        "city": [
          {
            "cityName": "بجنورد",
            "x": 57.33,
            "y": 37.45,
            "Key": "209467"
          },
          {
            "cityName": "گرمه",
            "x": 56.3,
            "y": 36.98,
            "Key": "209481"
          }
        ]
      },
      {
        "stateId": 13,
        "stateName": "خوزستان",
        "city": [
          {
            "cityName": "اهواز",
            "x": 48.67,
            "y": 31.24,
            "Key": "210047"
          },
          {
            "cityName": "بهبهان",
            "x": 50.24,
            "y": 30.6,
            "Key": "209906"
          },
          {
            "cityName": "خرمشهر",
            "x": 48.18,
            "y": 30.44,
            "Key": "210057"
          },
          {
            "cityName": "دزفول",
            "x": 48.42,
            "y": 32.38,
            "Key": "210056"
          },
          {
            "cityName": "دهدز",
            "x": 50.29,
            "y": 31.71,
            "Key": "209981"
          },
          {
            "cityName": "دهدز",
            "x": 50.29,
            "y": 31.71,
            "Key": "209935"
          },
          {
            "cityName": "رامهرمز",
            "x": 49.61,
            "y": 31.26,
            "Key": "209991"
          },
          {
            "cityName": "سوسنگرد",
            "x": 48.19,
            "y": 31.56,
            "Key": "209997"
          },
          {
            "cityName": "شادگان",
            "x": 48.66,
            "y": 30.64,
            "Key": "209911"
          },
          {
            "cityName": "شوش",
            "x": 48.26,
            "y": 32.21,
            "Key": "209912"
          },
          {
            "cityName": "شوشتر",
            "x": 48.83,
            "y": 32.05,
            "Key": "209920"
          },
          {
            "cityName": "گتوند",
            "x": 48.82,
            "y": 32.25,
            "Key": "209937"
          },
          {
            "cityName": "گتوند",
            "x": 48.82,
            "y": 32.25,
            "Key": "209984"
          }
        ]
      },
      {
        "stateId": 14,
        "stateName": "زنجان",
        "city": [
          {
            "cityName": "ابهر",
            "x": 49.22,
            "y": 36.14,
            "Key": "211696"
          },
          {
            "cityName": "آب بر",
            "x": 48.96,
            "y": 36.93,
            "Key": "211695"
          },
          {
            "cityName": "زنجان",
            "x": 48.49,
            "y": 36.68,
            "Key": "211728"
          },
          {
            "cityName": "گرماب",
            "x": 48.2,
            "y": 35.85,
            "Key": "211676"
          },
          {
            "cityName": "ماه نشان",
            "x": 47.67,
            "y": 36.74,
            "Key": "211685"
          }
        ]
      },
      {
        "stateId": 15,
        "stateName": "سمنان",
        "city": [
          {
            "cityName": "دامغان",
            "x": 54.34,
            "y": 36.17,
            "Key": "210905"
          },
          {
            "cityName": "سرخه",
            "x": 53.21,
            "y": 35.46,
            "Key": "210967"
          },
          {
            "cityName": "سمنان",
            "x": 53.38,
            "y": 35.58,
            "Key": "210904"
          },
          {
            "cityName": "گرمسار",
            "x": 52.33,
            "y": 35.22,
            "Key": "210974"
          }
        ]
      },
      {
        "stateId": 16,
        "stateName": "سیستان و بلوچستان",
        "city": [
          {
            "cityName": "بمپور",
            "x": 60.46,
            "y": 27.19,
            "Key": "211096"
          },
          {
            "cityName": "بنجار",
            "x": 61.57,
            "y": 31.04,
            "Key": "527266"
          },
          {
            "cityName": "چاه بهار",
            "x": 60.65,
            "y": 25.29,
            "Key": "211007"
          },
          {
            "cityName": "خاش",
            "x": 61.2,
            "y": 28.21,
            "Key": "211111"
          },
          {
            "cityName": "زابل",
            "x": 61.49,
            "y": 31.01,
            "Key": "211010"
          },
          {
            "cityName": "زاهدان",
            "x": 60.85,
            "y": 29.48,
            "Key": "211207"
          },
          {
            "cityName": "سراوان",
            "x": 62.33,
            "y": 27.36,
            "Key": "211124"
          },
          {
            "cityName": "سراوان",
            "x": 62.33,
            "y": 27.36,
            "Key": "211085"
          },
          {
            "cityName": "سوران",
            "x": 61.99,
            "y": 27.29,
            "Key": "211126"
          },
          {
            "cityName": "محمدآباد",
            "x": 61.46,
            "y": 30.87,
            "Key": "211081"
          },
          {
            "cityName": "محمدآباد",
            "x": 61.46,
            "y": 30.87,
            "Key": "211117"
          },
          {
            "cityName": "نگور",
            "x": 61.14,
            "y": 25.39,
            "Key": "211118"
          }
        ]
      },
      {
        "stateId": 17,
        "stateName": "فارس",
        "city": [
          {
            "cityName": "ارسنجان",
            "x": 53.3,
            "y": 29.91,
            "Key": "208230"
          },
          {
            "cityName": "استهبان",
            "x": 54.04,
            "y": 29.13,
            "Key": "208205"
          },
          {
            "cityName": "اوز",
            "x": 54.01,
            "y": 27.76,
            "Key": "208217"
          },
          {
            "cityName": "آباده",
            "x": 52.65,
            "y": 31.14,
            "Key": "208212"
          },
          {
            "cityName": "جهرم",
            "x": 53.57,
            "y": 28.49,
            "Key": "208223"
          },
          {
            "cityName": "خرامه",
            "x": 53.31,
            "y": 29.49,
            "Key": "208305"
          },
          {
            "cityName": "خنج",
            "x": 53.43,
            "y": 27.89,
            "Key": "208367"
          },
          {
            "cityName": "داراب",
            "x": 54.55,
            "y": 28.75,
            "Key": "208214"
          },
          {
            "cityName": "دهرم",
            "x": 52.3,
            "y": 28.49,
            "Key": "208482"
          },
          {
            "cityName": "سده",
            "x": 52.18,
            "y": 30.71,
            "Key": "208384"
          },
          {
            "cityName": "سروستان",
            "x": 53.22,
            "y": 29.26,
            "Key": "208333"
          },
          {
            "cityName": "سروستان",
            "x": 53.22,
            "y": 29.26,
            "Key": "208332"
          },
          {
            "cityName": "سروستان",
            "x": 53.22,
            "y": 29.26,
            "Key": "208383"
          },
          {
            "cityName": "سورمق",
            "x": 52.84,
            "y": 31.03,
            "Key": "208389"
          },
          {
            "cityName": "شیراز",
            "x": 52.53,
            "y": 29.56,
            "Key": "208538"
          },
          {
            "cityName": "صغاد",
            "x": 52.52,
            "y": 31.19,
            "Key": "208387"
          },
          {
            "cityName": "فراشبند",
            "x": 52.09,
            "y": 28.86,
            "Key": "208358"
          },
          {
            "cityName": "فسا",
            "x": 53.64,
            "y": 28.92,
            "Key": "208206"
          },
          {
            "cityName": "قادرآباد",
            "x": 53.26,
            "y": 30.28,
            "Key": "208324"
          },
          {
            "cityName": "گراش",
            "x": 54.15,
            "y": 27.67,
            "Key": "208220"
          },
          {
            "cityName": "لار",
            "x": 54.32,
            "y": 27.64,
            "Key": "208371"
          },
          {
            "cityName": "لامرد",
            "x": 53.19,
            "y": 27.33,
            "Key": "208442"
          },
          {
            "cityName": "مهر",
            "x": 52.88,
            "y": 27.55,
            "Key": "208446"
          }
        ]
      },
      {
        "stateId": 18,
        "stateName": "قزوین",
        "city": [
          {
            "cityName": "الوند",
            "x": 50.07,
            "y": 36.17,
            "Key": "378067"
          },
          {
            "cityName": "آبگرم",
            "x": 49.29,
            "y": 35.76,
            "Key": "210801"
          },
          {
            "cityName": "قزوین",
            "x": 50,
            "y": 36.28,
            "Key": "210816"
          },
          {
            "cityName": "نرجه",
            "x": 49.62,
            "y": 35.99,
            "Key": "1948324"
          }
        ]
      },
      {
        "stateId": 19,
        "stateName": "قم",
        "city": [
          {
            "cityName": "قم",
            "x": 50.87,
            "y": 34.59,
            "Key": "210842"
          }
        ]
      },
      {
        "stateId": 20,
        "stateName": "استان کردستان",
        "city": [
          {
            "cityName": "بانه",
            "x": 45.89,
            "y": 36,
            "Key": "210155"
          },
          {
            "cityName": "دزج",
            "x": 47.96,
            "y": 35.06,
            "Key": "210180"
          },
          {
            "cityName": "سقز",
            "x": 46.27,
            "y": 36.24,
            "Key": "210161"
          },
          {
            "cityName": "سنندج",
            "x": 47.01,
            "y": 35.24,
            "Key": "210185"
          },
          {
            "cityName": "قروه",
            "x": 47.81,
            "y": 35.16,
            "Key": "210159"
          }
        ]
      },
      {
        "stateId": 21,
        "stateName": "کرمان",
        "city": [
          {
            "cityName": "انار",
            "x": 55.27,
            "y": 30.87,
            "Key": "209213"
          },
          {
            "cityName": "بافت",
            "x": 56.6,
            "y": 29.23,
            "Key": "209215"
          },
          {
            "cityName": "جوزم",
            "x": 55.03,
            "y": 30.52,
            "Key": "209141"
          },
          {
            "cityName": "چترود",
            "x": 56.91,
            "y": 30.6,
            "Key": "209221"
          },
          {
            "cityName": "رابر",
            "x": 56.91,
            "y": 29.29,
            "Key": "209237"
          },
          {
            "cityName": "راور",
            "x": 56.8,
            "y": 31.24,
            "Key": "209238"
          },
          {
            "cityName": "رفسنجان",
            "x": 55.99,
            "y": 30.38,
            "Key": "209113"
          },
          {
            "cityName": "زرند",
            "x": 56.55,
            "y": 30.81,
            "Key": "209249"
          },
          {
            "cityName": "شهداد",
            "x": 57.7,
            "y": 30.42,
            "Key": "209245"
          },
          {
            "cityName": "فهرج",
            "x": 58.89,
            "y": 28.95,
            "Key": "209225"
          },
          {
            "cityName": "قلعه گنج",
            "x": 57.88,
            "y": 27.52,
            "Key": "209333"
          },
          {
            "cityName": "ماهان",
            "x": 57.29,
            "y": 30.06,
            "Key": "209234"
          },
          {
            "cityName": "منوجان",
            "x": 57.5,
            "y": 27.4,
            "Key": "209235"
          },
          {
            "cityName": "نگار",
            "x": 56.8,
            "y": 29.86,
            "Key": "209236"
          }
        ]
      },
      {
        "stateId": 22,
        "stateName": "کرمانشاه",
        "city": [
          {
            "cityName": "پاوه",
            "x": 46.37,
            "y": 35.03,
            "Key": "209428"
          },
          {
            "cityName": "روانسر",
            "x": 46.66,
            "y": 34.72,
            "Key": "209429"
          },
          {
            "cityName": "سرپل ذهاب",
            "x": 45.86,
            "y": 34.45,
            "Key": "209380"
          },
          {
            "cityName": "سنقر",
            "x": 47.6,
            "y": 34.76,
            "Key": "209389"
          },
          {
            "cityName": "سومار",
            "x": 45.64,
            "y": 33.87,
            "Key": "209411"
          },
          {
            "cityName": "سومار",
            "x": 45.64,
            "y": 33.87,
            "Key": "209430"
          },
          {
            "cityName": "صحنه",
            "x": 47.69,
            "y": 34.48,
            "Key": "209388"
          },
          {
            "cityName": "نودشه",
            "x": 46.25,
            "y": 35.18,
            "Key": "209402"
          },
          {
            "cityName": "نوسود",
            "x": 46.21,
            "y": 35.16,
            "Key": "209403"
          }
        ]
      },
      {
        "stateId": 23,
        "stateName": "کهگیلویه و بویراحمد",
        "city": [
          {
            "cityName": "لنده",
            "x": 50.42,
            "y": 30.98,
            "Key": "210109"
          },
          {
            "cityName": "یاسوج",
            "x": 51.58,
            "y": 30.66,
            "Key": "210096"
          }
        ]
      },
      {
        "stateId": 24,
        "stateName": "گلستان",
        "city": [
          {
            "cityName": "اق قالا",
            "x": 54.46,
            "y": 37.01,
            "Key": "208675"
          },
          {
            "cityName": "بندر ترکمن",
            "x": 54.08,
            "y": 36.9,
            "Key": "208691"
          },
          {
            "cityName": "گالیکش",
            "x": 55.43,
            "y": 37.27,
            "Key": "208681"
          },
          {
            "cityName": "گرگان",
            "x": 54.43,
            "y": 36.85,
            "Key": "208708"
          }
        ]
      },
      {
        "stateId": 25,
        "stateName": "گیلان",
        "city": [
          {
            "cityName": "اسالم",
            "x": 48.95,
            "y": 37.74,
            "Key": "208642"
          },
          {
            "cityName": "آستارا",
            "x": 48.87,
            "y": 38.39,
            "Key": "208644"
          },
          {
            "cityName": "رشت",
            "x": 49.59,
            "y": 37.28,
            "Key": "208612"
          },
          {
            "cityName": "رودسر",
            "x": 50.3,
            "y": 37.13,
            "Key": "208602"
          },
          {
            "cityName": "سنگر",
            "x": 49.7,
            "y": 37.18,
            "Key": "208653"
          },
          {
            "cityName": "شفت",
            "x": 49.4,
            "y": 37.16,
            "Key": "208654"
          },
          {
            "cityName": "صومعه سرا",
            "x": 49.32,
            "y": 37.3,
            "Key": "208613"
          },
          {
            "cityName": "فومن",
            "x": 49.31,
            "y": 37.23,
            "Key": "208598"
          },
          {
            "cityName": "لنگرود",
            "x": 50.15,
            "y": 37.2,
            "Key": "208601"
          },
          {
            "cityName": "ماسوله",
            "x": 48.99,
            "y": 37.16,
            "Key": "208628"
          },
          {
            "cityName": "هشتپر",
            "x": 48.9,
            "y": 37.8,
            "Key": "208638"
          }
        ]
      },
      {
        "stateId": 26,
        "stateName": "لرستان",
        "city": [
          {
            "cityName": "ازنا",
            "x": 49.45,
            "y": 33.46,
            "Key": "210272"
          },
          {
            "cityName": "الشتر",
            "x": 48.26,
            "y": 33.86,
            "Key": "210279"
          },
          {
            "cityName": "بروجرد",
            "x": 48.75,
            "y": 33.9,
            "Key": "210292"
          }
        ]
      },
      {
        "stateId": 27,
        "stateName": "مازندران",
        "city": [
          {
            "cityName": "آمل",
            "x": 52.36,
            "y": 36.48,
            "Key": "210535"
          },
          {
            "cityName": "بابل",
            "x": 52.68,
            "y": 36.52,
            "Key": "210536"
          },
          {
            "cityName": "بهشهر",
            "x": 53.53,
            "y": 36.7,
            "Key": "210526"
          },
          {
            "cityName": "بهشهر",
            "x": 53.53,
            "y": 36.7,
            "Key": "2311095"
          },
          {
            "cityName": "چالوس",
            "x": 51.42,
            "y": 36.65,
            "Key": "210528"
          },
          {
            "cityName": "قائم شهر",
            "x": 52.87,
            "y": 36.46,
            "Key": "210521"
          },
          {
            "cityName": "گلوگاه",
            "x": 53.81,
            "y": 36.73,
            "Key": "210530"
          },
          {
            "cityName": "نشتارود",
            "x": 51.04,
            "y": 36.75,
            "Key": "210554"
          }
        ]
      },
      {
        "stateId": 28,
        "stateName": "مرکزی",
        "city": [
          {
            "cityName": "اراک",
            "x": 49.72,
            "y": 34.09,
            "Key": "210434"
          },
          {
            "cityName": "آستانه",
            "x": 49.35,
            "y": 33.89,
            "Key": "210397"
          },
          {
            "cityName": "تفرش",
            "x": 50.02,
            "y": 34.69,
            "Key": "210422"
          },
          {
            "cityName": "خنداب",
            "x": 49.19,
            "y": 34.38,
            "Key": "210429"
          },
          {
            "cityName": "ساوه",
            "x": 50.36,
            "y": 35.03,
            "Key": "210377"
          },
          {
            "cityName": "شازند",
            "x": 49.41,
            "y": 33.93,
            "Key": "210410"
          },
          {
            "cityName": "محلات",
            "x": 50.45,
            "y": 33.91,
            "Key": "210376"
          },
          {
            "cityName": "نراق",
            "x": 50.84,
            "y": 34.01,
            "Key": "210405"
          }
        ]
      },
      {
        "stateId": 29,
        "stateName": "هرمزگان",
        "city": [
          {
            "cityName": "بندرعباس",
            "x": 56.29,
            "y": 27.19,
            "Key": "208929"
          },
          {
            "cityName": "جناح",
            "x": 54.29,
            "y": 27.02,
            "Key": "208841"
          },
          {
            "cityName": "درگهان",
            "x": 56.07,
            "y": 26.96,
            "Key": "208774"
          },
          {
            "cityName": "سرگز",
            "x": 56.66,
            "y": 27.94,
            "Key": "208892"
          },
          {
            "cityName": "قشم",
            "x": 56.27,
            "y": 26.95,
            "Key": "208851"
          },
          {
            "cityName": "هرمز",
            "x": 56.46,
            "y": 27.09,
            "Key": "208926"
          }
        ]
      },
      {
        "stateId": 30,
        "stateName": "همدان",
        "city": [
          {
            "cityName": "اسدآباد",
            "x": 48.12,
            "y": 34.79,
            "Key": "208714"
          },
          {
            "cityName": "بهار",
            "x": 48.44,
            "y": 34.89,
            "Key": "208735"
          },
          {
            "cityName": "جورقان",
            "x": 48.55,
            "y": 34.88,
            "Key": "208751"
          },
          {
            "cityName": "نهاوند",
            "x": 48.38,
            "y": 34.17,
            "Key": "208716"
          },
          {
            "cityName": "همدان",
            "x": 48.53,
            "y": 34.79,
            "Key": "208760"
          }
        ]
      },
      {
        "stateId": 31,
        "stateName": "یزد",
        "city": [
          {
            "cityName": "بافق",
            "x": 55.4,
            "y": 31.6,
            "Key": "211600"
          },
          {
            "cityName": "تفت",
            "x": 54.21,
            "y": 31.74,
            "Key": "211616"
          },
          {
            "cityName": "زارچ",
            "x": 54.24,
            "y": 31.98,
            "Key": "211595"
          },
          {
            "cityName": "طبس",
            "x": 56.94,
            "y": 33.58,
            "Key": "211542"
          },
          {
            "cityName": "عقدا",
            "x": 53.63,
            "y": 32.44,
            "Key": "211546"
          },
          {
            "cityName": "عقدا",
            "x": 53.63,
            "y": 32.44,
            "Key": "211598"
          },
          {
            "cityName": "مروست",
            "x": 54.21,
            "y": 30.47,
            "Key": "211610"
          },
          {
            "cityName": "یزد",
            "x": 54.35,
            "y": 31.88,
            "Key": "211668"
          }
        ]
      }
    ],
  },
  methods:{
    calcDigiClock(){
      this.digis = parseInt(this.digis) + 1;
      if(parseInt(this.digis) >= 60){
        this.digis = 0;
        this.digim = parseInt(this.digim) + 1;
      }
      if(parseInt(this.digim) >= 60){
        this.digim = 0;
        this.digih = parseInt(this.digih) + 1;
      }
      if(parseInt(this.digih) >= 24){
        this.digih = 0;
        this.digim = 0;
        this.digis = 0;
      }
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
    pad(d){
      return (d < 10) ? '0' + d.toString() : d.toString();
    },
    clockRunAuto(){
      for(let i=0; i<60; i++)
        $('.clock__marks').append('<li></li>');
      let radius = 6;
      let currentTime = new Date();
      let second = currentTime.getSeconds() * radius;
      let minute = currentTime.getMinutes() * radius + Math.floor(second / (radius * 10) * 10) / 10;
      let hour = currentTime.getHours() * radius * 5 + Math.floor(minute / (radius * 2) * 10) / 10;
      this.setClockHandsAuto(second, minute, hour);
    },
    setClockHandsAuto(second, minute, hour){
      let radius = 6;
      let secondElm = $('.clock__hand--second');
      let minuteElm = $('.clock__hand--minute');
      let hourElm = $('.clock__hand--hour');

      secondElm.css('transform', 'rotate(' + second + 'deg)');
      minuteElm.css('transform', 'rotate(' + minute + 'deg)');
      hourElm.css('transform', 'rotate(' + hour + 'deg)');
      let interval = 1000; //1 second
      let before = new Date();
      let analogClock = setInterval(function(){
        let now = new Date();
        let elapsedTime = now.getTime() - before.getTime(); //Fix calculating in inactive tabs
        let delay = Math.round(elapsedTime/interval);

        second += radius * delay;
        for(let i=0; i<delay; i++){
          if( ((second - i) * radius) % (radius * 5) === 0 ){
            minute += 0.5;
            if( minute % radius === 0 ){
              hour += 0.5;
            }
          }
        }
        secondElm.css('transform', 'rotate(' + second + 'deg)');
        minuteElm.css('transform', 'rotate(' + minute + 'deg)');
        hourElm.css('transform', 'rotate(' + hour + 'deg)');
        before = new Date();
      }, interval);
    },
    clockRun(GregorianDate, digiH, digiM, digiS, timezone){
      let radius = 6;
      for(let i=0; i<60; i++)
        $('.clock__marks').append('<li></li>');
      let currentTime = new Date(GregorianDate + 'T' + digiH + ":" + digiM + ":" + digiS + timezone);
      let second = currentTime.getSeconds() * radius;
      let minute = currentTime.getMinutes() * radius + Math.floor(second / (radius * 10) * 10) / 10;
      let hour = currentTime.getHours() * radius * 5 + Math.floor(minute / (radius * 2) * 10) / 10;
      this.setClockHands(second, minute, hour);
    },
    setClockHands(second, minute, hour) {
      let radius = 6;
      let secondElm = $('.clock__hand--second');
      let minuteElm = $('.clock__hand--minute');
      let hourElm = $('.clock__hand--hour');
      secondElm.css('transform', 'rotate(' + second + 'deg)');
      minuteElm.css('transform', 'rotate(' + minute + 'deg)');
      hourElm.css('transform', 'rotate(' + hour + 'deg)');
      let clearTime = 0;
      let timerCounter = parseInt(digis);
      let interval = 1000; //1 second
      let pad= (d) =>{
        return (d < 10) ? '0' + d.toString() : d.toString();
      };
      let before = new Date(currentGregorianDate + 'T' + digih + ":" + digim + ":" + pad(timerCounter) + timeZone);
      let analogClock = setInterval(function(){
        let now = new Date(currentGregorianDate + 'T' + digih + ":" + digim + ":" + pad(timerCounter) + timeZone);
        let elapsedTime = now.getTime() - before.getTime(); //Fix calculating in inactive tabs
        let delay = Math.round(elapsedTime/interval);
        second += radius * delay;
        for(let i=0; i<delay; i++){
          if( ((second - i) * radius) % (radius * 5) === 0 ){
            minute += 0.5;
            if( minute % radius === 0 ){
              hour += 0.5;
            }
          }
        }
        secondElm.css('transform', 'rotate(' + second + 'deg)');
        minuteElm.css('transform', 'rotate(' + minute + 'deg)');
        hourElm.css('transform', 'rotate(' + hour + 'deg)');
        before = new Date(currentGregorianDate + 'T' + digih + ":" + digim + ":" + pad(timerCounter) + timeZone);
        timerCounter++;
        timerCounter = (timerCounter >= 60) ? '0' : timerCounter;
        clearTime++;
        if (clearTime >= 180) {
          window.location.reload(false);
        }
      }, interval);
    }
  },mounted() {
    let serverDate = new Date(this.currentDateForHours);
    let localDate = new Date();
    if (serverDate.getFullYear() == localDate.getFullYear() && serverDate.getMonth() == localDate.getMonth()
      && serverDate.getDay() == localDate.getDay() && serverDate.getHours() == localDate.getHours()) {
      this.clockRunAuto();
      let d = new Date(); //Create an date object
      d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
      let expires = "expires=" + d.toGMTString(); //Compose the expirartion date
      window.document.cookie = "checkDate="+"; "+expires;//Set the cookie with name and the expiration date
      this.modalTimeUnCurrect = false;
    } else {
      let out =  "";
      let name = "checkDate" + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          out = c.substring(name.length, c.length);
        }
      }
      if (out != "" && out == "true") {
        this.modalTimeUnCurrect = false;
      }else if(out == "" || out == "false"){
        let d = new Date();
        d.setTime(d.getTime() + (360 * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toGMTString();
        document.cookie = "checkDate" + "=" + false + ";" + expires + ";path=/";
        this.modalTimeUnCurrect = true;
      }
      this.clockRun(currentGregorianDate, digih, digim, digis, timeZone);
    }
    this.intervalid1 = setInterval(function(){
      this.calcDigiClock();
    }.bind(this), 1000);
  }
});
$(document).ready(function(){
  $("#alertModal").modal('show');
});
require('./script');
