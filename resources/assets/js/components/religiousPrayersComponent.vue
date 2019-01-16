<template>
  <div>
    <div class="container d-none d-lg-block">
      <div class="whole-page vertical-middle">
        <div class="vertical-middle__child">
          <div class="clock">
            <ul class="clock__marks"></ul>
            <div class="clock__hands">
              <div class="clock__hand clock__hand--hour"></div>
              <div class="clock__hand clock__hand--minute"></div>
              <div class="clock__hand clock__hand--second"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-right">
      <div class="row">
        <div class="col d-none d-lg-block"></div>
        <div class="col">
          <select name="state" id="state" class="form-control" v-model="stateOwghat" :change="stateOwghatChange">
            <option v-for="(value, index) in state" :value="value.stateId" v-text="value.stateName"></option>
          </select>
        </div>
        <div class="col">
          <select name="city" id="city" class="form-control" v-model="cityOwghat">
            <option v-for="cityItem in city" v-text="cityItem.cityName" :value="cityItem.x+','+cityItem.y+','+cityItem.Key"></option>
          </select>
        </div>
        <div class="col">
          <button class="btn bg-default text-white pr-5 pl-5" @click="getOwghat">اعمال</button>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3 d-none d-lg-block"></div>
        <div class="col-md-9 d-flex justify-content-start align-items-center">

          <b>آخرین وضعیت ثبت شده آب و هوا در ۱۲ ساعت گذشته :</b>
          <img v-if="WeatherIcon != '-'" :src="'/images/weather/' + WeatherIcon + '-s.png'" alt="Weather icon">
          <span v-text="WeatherText"></span>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3 d-none d-lg-block"></div>
        <div class="col-md-9 d-flex justify-content-start align-items-center" v-if="Temperature != '-'">
          <b>آخرین وضعیت ثبت شده حرارت دما در ۱۲ ساعت گذشته: </b>&deg;<span v-text="Temperature"></span> سانتیگراد
        </div>
      </div>
      <div class="row mt-4">
        <div class="col d-none d-lg-block"></div>
        <div class="col d-flex justify-content-start align-items-center">
          <div class="prayer-time-icon" id="azan-sobh"></div>
          <b>اذان صبح</b> :
          <span v-text="azanSobh"></span>
        </div>
        <div class="col d-flex justify-content-start align-items-center">
          <div class="prayer-time-icon" id="toolo-aftab"></div>
          <b>طلوع آفتاب</b> :
          <span v-text="toloAftab"></span>
        </div>
        <div class="col d-flex justify-content-start align-items-center">
          <div class="prayer-time-icon" id="azan-zohr"></div>
          <b>اذان ظهر</b> :
          <span v-text="azanZohr"></span>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col d-none d-lg-block"></div>
        <div class="col d-flex justify-content-start align-items-center">
          <div class="prayer-time-icon" id="ghrob-aftab"></div>
          <b>غروب آفتاب</b> :
          <span v-text="ghorobAftab"></span>
        </div>
        <div class="col d-flex justify-content-start align-items-center">
          <div class="prayer-time-icon" id="azan-maghreb"></div>
          <b>اذان مغرب</b> :
          <span v-text="azanMaghreb"></span>
        </div>
        <div class="col d-flex justify-content-start align-items-center">
          <div class="prayer-time-icon" id="nime-shab"></div>
          <b>نیمه شب شرعی</b> :
          <span v-text="nimeShabSharee"></span>
        </div>
      </div>

    </div>
  </div>

</template>

<script>
  export default {
    name: "religiousPrayersComponent",
    data(){
      return({
        azanSobh:'',
        toloAftab:'',
        azanZohr:'',
        ghorobAftab:'',
        azanMaghreb:'',
        nimeShabSharee:'',
        weatherCity:'',
        stateOwghat:8,
        cityOwghat: "",
        state : this.$parent.state,
        city: [],
        WeatherText: "-",
        WeatherIcon: "3",
        Temperature: '-',
      })
    },
    methods:{
      getOwghat() {
        let position = this.cityOwghat.split(',');
        let self = this;
        axios.get('/api/getOwghat/' + position[0] + '/' + position[1] )
          .then(response => {
            self.azanSobh = response.data.s;
            self.toloAftab= response.data.t;
            self.azanZohr = response.data.z;
            self.ghorobAftab= response.data.g;
            self.azanMaghreb= response.data.m;
            self.nimeShabSharee= response.data.n;
          });
        axios.get('/api/showWaether/' + position[2]).then(response => {
          self.WeatherText = "امکان بارگذاری وضعیت آب و هوا وجود ندارد";
          self.WeatherIcon = "-";
          self.Temperature = "-";
          if (response.data.status == "200") {
            self.WeatherText = response.data.WeatherText;
            self.WeatherIcon = response.data.WeatherIcon;
            self.Temperature = response.data.Temperature;
          }
        }).catch(error => {
          if (error.response.status == 429) {
            self.WeatherText = "تعداد درخواست شما برای مشاهده آب و هوا بیش از حد مجاز است.";
            self.WeatherIcon = "-";
            self.Temperature = "-";
          }
        });
      }
    },
    computed:{
      stateOwghatChange() {
        for (let stateItem in this.state) {
          if (this.state[stateItem].stateId == this.stateOwghat) {
            this.city =this.state[stateItem].city;
            this.cityOwghat = this.state[stateItem].city[0].x +"," + this.state[stateItem].city[0].y+ "," + this.state[stateItem].city[0].Key;
            this.weatherCity = this.state[stateItem].city[0].Key;
          }
        }
      }
    },
    mounted(){
      this.cityOwghat = "51.35,35.7,210841";
      let position = this.cityOwghat.split(',');
      this.weatherCity = position[2];
      let self = this;
      axios.get('/api/getOwghat/' + position[0] + '/' + position[1] )
        .then(response => {
          self.azanSobh = response.data.s;
          self.toloAftab= response.data.t;
          self.azanZohr = response.data.z;
          self.ghorobAftab= response.data.g;
          self.azanMaghreb= response.data.m;
          self.nimeShabSharee= response.data.n;
        });
      axios.get('/api/showWaether/' + position[2]).then(response => {
        self.WeatherText = "امکان بارگذاری وضعیت آب و هوا وجود ندارد";
        self.WeatherIcon = "-";
        self.Temperature = "-";
        if (response.data.status == "200") {
          self.WeatherText = response.data.WeatherText;
          self.WeatherIcon = response.data.WeatherIcon;
          self.Temperature = response.data.Temperature;
        }
     }).catch(error => {
        if (error.response.status == 429) {
          self.WeatherText = "تعداد درخواست شما برای مشاهده آب و هوا بیش از حد مجاز است.";
          self.WeatherIcon = "-";
          self.Temperature = "-";
        }
      });
    }
  }
</script>

<style scoped>
  #azan-sobh {
    background-position: 167px 0;
  }
  #toolo-aftab {
    background-position: 83px 0;
  }
  #azan-zohr {
    background-position: 124px 0;
  }
  #ghrob-aftab {
    background-position: -209px 0;
  }
  #azan-maghreb{
    background-position: 210px 0;
  }
  #nime-shab {
    background-position: 0px 0;
  }
</style>