@extends('layout.layout')
@section('title')تنطیم تاریخ و ساعت سیستم عامل@endsection
@section('keywords')تنظیم تاریخ,ویندوز,لینوکس, mac, موقعیت زمانی, زمان,ساعت@endsection
@section('description')تنظیم زمان سیستم عامل به صورت خودکار و دستی@endsection
@section('content')
    <div class="container card mb-3">
        <div class="card-body text-right pt-5">
            <h3>تنظیم ساعت سیستم عامل</h3>
            <p>
                برای تنظیم ساعت سیستم عامل خود به صورت خودکار و دستی ابتدا باید بر روی نام سیستم عامل کلیک کرده
                سپس مراحل گفته شده را انجام دهید.
            </p>
            <div class="mt-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link outline-0 active" id="nav-home-tab" data-toggle="tab" href="#windows-ten" role="tab" aria-controls="nav-home" aria-selected="true">ویندوز 10</a>
                        <a class="nav-item nav-link outline-0" id="nav-contact-tab" data-toggle="tab" href="#windows-eight" role="tab" aria-controls="nav-contact" aria-selected="false">ویندوز 8</a>
                        <a class="nav-item nav-link outline-0" id="nav-profile-tab" data-toggle="tab" href="#windows-seven" role="tab" aria-controls="nav-profile" aria-selected="false">ویندوز 7</a>
                        <a class="nav-item nav-link outline-0" id="nav-profile-tab" data-toggle="tab" href="#linux-ubuntu" role="tab" aria-controls="nav-profile" aria-selected="false">لینوکس (اوبونتو)</a>
                        <a class="nav-item nav-link outline-0" id="nav-profile-tab" data-toggle="tab" href="#mac-os" role="tab" aria-controls="nav-profile" aria-selected="false">Mac</a>
                    </div>
                </nav>
                <div class="tab-content pr-4 pt-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="windows-ten" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h5>۱. روش اول تنظیم خودکار</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                در صفحه دسکتاپ قسمت پایین سمت چپ بر روی ایکون ویندوز  (Start) کلیک نمایید و سپس بر روی آیکون چرخ دنده کلیک تا وارد بخش تنظیمات شوید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/4.png') }}" alt="Windows 10 Settings">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                در پنجره باز شده به بخش Time & language بروید. این بخش شامل تمامی تنظیمات زمان و زبان میباشد.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/5.png') }}" alt="Time & language">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                از منو سمت چپ Date & time را انتخاب نمایید
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/6.png') }}" alt="Date & time">
                            <p class="mt-5">
                                <b>گام چهار :</b>
                                در این بخش با کلیک بر روی دکمه Set time automatically زمان به صورت خودکار از طریق اینترنت به روز رسانی میشود.
                                در این بخش همچنین میتوانید با کلیک بر روی گزینه Set time zone automatically موقعیت زمانی خود را به صورت آنلاین بروز رسانی نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/7.png') }}" alt="Date & time">
                        </div>
                        <hr>
                        <h5>۲. تنظیم تاریخ به صورت دستی</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                در صفحه دسکتاپ قسمت پایین سمت راست بر روی ساعت کلیک کرده و گزینه Change date and time settings را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/1.png') }}" alt="Change date and time settings">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                سپس در پنجره باز شده بر روی دکمه Change date and time کلیک کنید
                                (برای تغییر موقعیت زمانی میتوانید بر روی دکمه Change time zone کلیک کنید).
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/2.png') }}" alt="Change date and time">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                در پنجره جدید میتوانید ساعت و تاریخ را تغییر دهید و پس از کلیک بر روی دکمه Ok تغییرات اعمال میشود.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/3.png') }}" alt="Change date and time">
                            <p class="mt-5">
                                <b>پیشنهاد :</b>
                                پیشنهاد میشود زمان را به صورت بروز رسانی خودکار قرار دهید.
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="windows-eight" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h5>۱. روش اول تنظیم خودکار</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                در صفحه دسکتاپ قسمت پایین سمت راست بر روی ساعت کلیک راست و گزینه Adjust data/time را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/8.png') }}" alt="Windows 8 Clock">
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/9.png') }}" alt="Windows 8 Right Click On Clock">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                در پنجره باز شده به منو (تب) Internet Time و بر روی دکمه Change settings کلیک کنید
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/10.png') }}" alt="Internet Time Windows 8">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                تیک گزینه Synchronize with an Internet time server را زده و بر روی دکمه Update now کلیک نمایید(میتوانید از منوی کشویی
                                سرور زمان را تغییر دهید).
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/11.png') }}" alt="Date & time">
                        </div>
                        <hr>
                        <h5>۲. تنظیم تاریخ به صورت دستی</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                دکمه Windows + X را گرفته و سپس از پنجره باز شده گزینه Control Panel را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/12.png') }}" alt="Open Control Panel Window 8">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                از پنجره باز شده گزینه Clock, Language, and Region را انتخاب نمایید (در نظر داشته باشید View باید بر روی Category قرارگرفته باشد).
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/1.png') }}" alt="Clock, Language, and Region">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                در این بخش گزینه Set the time and date را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/2.png') }}" alt="Set the time and date">
                            <p class="mt-5">
                                <b>گام چهارم :</b>
                                در پنجره باز شده بر روی گزینه Change date and time کلیک نمایید
                                (برای تغییر موقعیت زمانی میتوانید بر روی دکمه Change time zone کلیک کنید).
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/8/3.png') }}" alt="Set the time and date">
                            <p class="mt-5">
                                <b>گام پنجم :</b>
                                در پنجره جدید میتوانید ساعت و تاریخ را تغییر دهید و پس از کلیک بر روی دکمه Ok تغییرات اعمال میشود.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/10/3.png') }}" alt="Change date and time">
                            <p class="mt-5">
                                <b>پیشنهاد :</b>
                                پیشنهاد میشود زمان را به صورت بروز رسانی خودکار قرار دهید.
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="windows-seven" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h5>۱. روش اول تنظیم خودکار</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                در صفحه دسکتاپ قسمت پایین سمت راست بر روی ساعت کلیک کرده و گزینه Change date and time settings را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/7/1.png') }}" alt="Change date and time settings windows7">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                در پنجره باز شده به منو (تب) Internet Time و بر روی دکمه Change settings کلیک کنید
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/7/4.png') }}" alt="Internet Time Windows 8">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                تیک گزینه Synchronize with an Internet time server را زده و بر روی دکمه Update now کلیک نمایید(میتوانید از منوی کشویی
                                سرور زمان را تغییر دهید).
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/7/5.png') }}" alt="Date & time">
                        </div>
                        <hr>
                        <h5>۲. تنظیم تاریخ به صورت دستی</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                در صفحه دسکتاپ قسمت پایین سمت راست بر روی ساعت کلیک کرده و گزینه Change date and time settings را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/7/1.png') }}" alt="Change date and time settings windows7">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                در پنجره باز شده بر روی گزینه Change date and time کلیک نمایید
                                (برای تغییر موقعیت زمانی میتوانید بر روی دکمه Change time zone کلیک کنید).
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/7/2.png') }}" alt="Clock, Language, and Region">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                در پنجره جدید میتوانید ساعت و تاریخ را تغییر دهید و پس از کلیک بر روی دکمه Ok تغییرات اعمال میشود.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/7/3.png') }}" alt="Set the time and date">
                            <p class="mt-5">
                                <b>پیشنهاد :</b>
                                پیشنهاد میشود زمان را به صورت بروز رسانی خودکار قرار دهید.
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="linux-ubuntu" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <h5>۱. روش اول تنظیم خودکار</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                ابتدا دکمه Super key (Start) را زده و در قسمت سرچ برنامه ها Date & Time  را سرچ نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/linux/1.png') }}" alt="Date & Time Linux">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                تیک گزینه Automatic Date & Time را زده (در حال ON قرار بگیرد) و برای موقعیت مکانی خودکار تیک گزینه Automatic Time Zone را بزنید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/linux/2.png') }}" alt="Set date and time automatically Ubuntu">
                        </div>
                        <hr>
                        <h5>۲. تنظیم تاریخ به صورت دستی</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                ابتدا دکمه Super key (Start) را زده و در قسمت سرچ برنامه ها Date & Time  را سرچ نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/linux/1.png') }}" alt="Date & Time Linux">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                تیک گزینه Automatic Date & Time را برداشته (در حال OFF قرار بگیرد) و در قسمت Date & Time  زمان را تنظیم نمایید.
                                 برای موقعیت مکانی خودکار تیک گزینه Automatic Time Zone را برداشته و موقعیت مکانی مورد نظر خود را از منو کشویی
                                TimeZone انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/linux/2.png') }}" alt="Manually Date & Time Ubuntu">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mac-os" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h5>۱. روش اول تنظیم خودکار</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                ابتدا بر روی گزینه System Preferences کلیک کرده و در پنجره باز شده گزینه Date & Time را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/mac/1.jpg') }}" alt="Date & Time Mac">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                در پنجره باز شده تیک گزینه Set date and time automatically را بزنید سپس با منو کشویی Set date and time automatically
                                میتوانید سرور زمانی مورد نظر را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/mac/2.jpg') }}" alt="Set date and time automatically Mac">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                برای انتخاب خودکار موقعیت زمانی بر روی تب Time Zone کلیک کرده و تیک گزینه Set time zone automatically using current location
                                بزنید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/mac/4.jpg') }}" alt="Time Zone Mac">
                        </div>
                        <hr>
                        <h5>۲. تنظیم تاریخ به صورت دستی</h5>
                        <div class="pr-3 mt-4 mb-5">
                            <p>
                                <b>گام اول :</b>
                                ابتدا بر روی گزینه System Preferences کلیک کرده و در پنجره باز شده گزینه Date & Time را انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/mac/1.jpg') }}" alt="Date & Time Mac">
                            <p class="mt-5">
                                <b>گام دوم :</b>
                                در ابتدا تیک گزینه Set date and time automatically را برداشته و سپس تاریخ و ساعت مورد نظر خود را تنظیم نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/mac/6.jpg') }}" alt="Manually Date & Time Mac">
                            <p class="mt-5">
                                <b>گام سوم :</b>
                                برای انتخاب دستی موقعیت زمانی بر روی تب Time Zone کلیک کرده و تیک گزینه Set time zone automatically using current location
                                را بردارید و موقعیت خود را بر روی نقشه انتخاب نمایید.
                            </p>
                            <img class="rounded img-fluid" src="{{ asset('/images/set-time/mac/4.jpg') }}" alt="Time Zone Mac">
                            <p class="mt-5">
                                <b>پیشنهاد :</b>
                                پیشنهاد میشود زمان را به صورت بروز رسانی خودکار قرار دهید.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection