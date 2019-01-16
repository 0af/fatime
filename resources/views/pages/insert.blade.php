<div style="width: 80%;direction: rtl;text-align: center;margin: 0 auto">
    <form action="/newGhamariEvent" method="post">
        {{ csrf_field() }}
        <label>عنوان :‌ </label><input type="text" name="title" placeholder="title">
        <br>
        <br>
        <label>توضیحات :‌ </label><textarea name="body" placeholder="body"></textarea>
        <br>
        <br>
        <label>داده عکس :‌ </label><textarea name="image" placeholder="image"></textarea>
        <br>
        <br>
        <label> ماه : </label><input type="number" name="month" placeholder="month">
        <br>
        <br>
        <label>روز :‌ </label><input type="number" name="day" placeholder="day">
        <br>
        <br>
        <label>جزیيات :‌ </label><input type="text" name="details" placeholder="Details">
        <br>
        <br>
        <label>روز تعظیل : </label> <input type="checkbox" value="true" name="isHoliday">
        <br>
        <br>
        <label>تقویم : </label>
        <br>
        <br>
        جلالی :‌ <input type="radio" value="jalali" name="eventType">
        <hr>
        قمری :‌ <input type="radio" value="ghamari" name="eventType">
        <hr>
        میلادی : <input type="radio" value="gregorian" name="eventType">
        <hr>
        <button>Send</button>
    </form>
</div>