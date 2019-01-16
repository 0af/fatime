<template>
  <div>
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <span class="text-danger">هشدار</span>
          </div>

          <div class="modal-body">
            <div>
              <span>این هشدار به دلایل زیر میتواند باشد : </span>
              <ul>
                <li class="mt-3">منطقه زمان سیستم شما بر روی ایران تنظیم نشده باشد.</li>
                <li class="mt-2">تاریخ سیستم شما به اشتباه تنظیم شده باشد و بروز نباشد.</li>
                <li class="mt-2">امکان بررسی ساعت سیستم شما وجود نداشته باشد.</li>
              </ul>
            </div>
          </div>
          <input type="checkbox" v-model="hideCheckTimeMessage" value="true">
          <label for="">این پیغام دیگر نمایش داده نشود</label>
          <hr>
          <div>
            <a class="btn btn-info ml-3 pr-4 pl-4 text-white" href="/set-time-zone">راهنما</a>
            <button class="btn btn-primary pr-4 pl-4" @click="closeWarning">باشه</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "checkTimeModal",
    props: ["time"],
    data(){
      return({
        hideCheckTimeMessage: false,
      })
    },methods:{
      closeWarning() {
        if (this.hideCheckTimeMessage) {
          let d = new Date();
          d.setTime(d.getTime() + (360 * 24 * 60 * 60 * 1000));
          let expires = "expires=" + d.toGMTString();
          document.cookie = "checkDate" + "=" + true + ";" + expires + ";path=/";
        } else {
          let d = new Date();
          d.setTime(d.getTime() + (360 * 24 * 60 * 60 * 1000));
          let expires = "expires=" + d.toGMTString();
          document.cookie = "checkDate" + "=" + false + ";" + expires + ";path=/";
        }
        this.$emit('close');
      },
    },
    mounted(){
    }
  }
</script>

<style scoped>


</style>