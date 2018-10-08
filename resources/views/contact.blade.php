@extends('layouts.home')

@section('title')تماس با ما@endsection

@section('content')

@if(Session::has('success'))
   <div class="alert alert-success">
     {{ Session::get('success') }}
   </div>
@endif

<div class="contact">
    <div class="container">
        <div class="contact-head">
            <h2 class="persianFont myDirection">تماس با ما </h2>
            <p class="persianFont myDirection"> راه های ارتباط با ما به شرح زیر هستند.</p>
        </div>
        <div class="contact-grids">
            <div class="col-md-8 map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6379.548120018775!2d50.63968894516442!3d36.91966616414801!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x24a853b767ff9961!2z2YXZiNiz2LPZhyDYjCDYotmF2YjYsti02q_Yp9mHINmIINmB2LHZiNi02q_Yp9mHINmG2LPZitmFINix2KfZhdiz2LE!5e0!3m2!1sen!2s!4v1526536527685" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 con-grid">
                <div class="contact-grid1">
                    <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                    <div class="con-ic">
                        <address>
                        <p class="persianFont myDirection"><span>رامسر</span>
                            خیابان استاد مطهری، نارنجبن، جنب بانک صادرات
                        </p>
                        </address>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="contact-grid contact-grid1">
                    <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                    <div class="con-ic">
                        <p class="persianFont"><tel>+11 5525 6633</tel>
                            <span>+11 5525 9606 (فکس)</span>
                        </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="contact-grid1">
                    <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                    <div class="con-ic">
                        <p style="margin-top: 14px;">
                            <a href="mailto:info@example.com">info@nasimramsar.com</a>
                            <!-- <span>
                                <a href="mailto:info@example.com">info@example2.com</a>
                            </span> -->
                        </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <form id="messageForm"  role="form" method="post" action="url('contact')">
            <div class="contact-grids1 myDirection">
                <div class="contact-me ">
                    <h4 class="persianFont">نظر یا پیشنهاد شما</h4>
                    <textarea name="body" placeholder="" required="پیامی را وارد کنید" class="persianFont"> </textarea>
                </div>
                <div class="col-md-5 contact-form1 pull-right">
                    <h4 class="persianFont">نام شما</h4>
                    <input type="text" name="name" placeholder="" required="نام خود را وارد کنید" class="persianFont">
                </div>
                <div class="col-md-5 contact-form1 pull-right">
                    <h4 class="persianFont">ایمیل</h4>
                    <input type="email" name="email" placeholder="" required="ایمیل خود را وارد کنید">
                </div>
                <div class="col-md-2 contact-form pull-left">
                    <input type="submit" value="ارسال پیام" class="persianFont">
                </div>
                <div class="clearfix"> </div>

            </div>
        </form>
    </div>
</div>
@endsection
