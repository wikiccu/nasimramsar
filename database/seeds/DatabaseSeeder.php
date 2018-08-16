<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //add user
        DB::table('users')->insert([
            'name' => 'mohsen1299',
            'email' => 'mohsen1299@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        //add subject
        DB::table('subjects')->insert(['title'=>'دوره های جدید']);
        DB::table('subjects')->insert(['title'=>'اخبار موسسه']);
        DB::table('subjects')->insert(['title'=>'مطالب آموزشی']);
        DB::table('subjects')->insert(['title'=>'اخبار فروشگاه']);
        //add post
        DB::table('posts')->insert([
            'pic' => 'images/news/modem.jpg',
            'title' => 'عرضه مودم نسل چهارم',
            'abstract' => 'مودم نسل چهارم اینترنت آسیاتک (LTE) در فروشگاه نسیم رایانه عرضه می گردد.',
            'body' => '<p>با امکان اتصال به رایانه و اینترنت بیسیم (wifi) برای اتصال به تلفن همراه، در محل فروشگاه نسیم رایانه عرضه می شود.</p>',
            'subject_id'=>4,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/web.jpg',
            'title' => 'دوره های برنامه نویسی',
            'abstract' => 'ثبت نام دوره های تابستانه کلاس های برنامه نویسی',
            'body' => '<p>آموزش برنامه نویسی تلفن های همراه و دستگاه های همراه، آموزش طراحی صفحات وب، طراحی پایگاه های داده و ساخت نرم افزار های مختلف به کمک تکنولوژی های جدید در موسسه فرهنگی هنری نسیم رامسر ادامه دارد.</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/kargah2.jpg',
            'title' => 'کارگاه های حسابداری',
            'abstract' => 'ثبت نام کارگاه های جدید حسابداری و مالی، با تدریس استاد ابراهیمیان و ... آغاز گردید .',
            'body' => '<p>ثبت نام کار گاه های حسابداری مقدماتی و پیشرفته، مسائل مالی و حسابداری و مالیاتی و همچنین آموزش نرم افزار مالی در موسسه نسیم شروع شد.</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/carpet.jpg',
            'title' => 'کلاس های صنایع دستی',
            'abstract' => 'ثبت نام دوره های جدید کلاس های قالی بافی، چرم دوزی و ... با تدریس استاد سرکار خانم قربانی آغاز گردید .',
            'body' => '<p>دوره ها همراه با  اساتید مجرب و کار عملی در با همکاری موسسه بهارستان برگزار می شود.</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/orf.jpg',
            'title' => 'دوره موسیقی کودکان',
            'abstract' => 'ثبت نام دوره های جدید موسیقی کودکان با تدریس استاد گلپور شروع شد.',
            'body' => '<p>ثبت نام دوره های تابستانه موسیقی کودکان همراه با آموزش شناخت آواهای مختلف، شناخت نت ها و ساز های مختلف با تدریس استاد گلپور در موسسه فرهنگی و هنری رامسر آغاز گردید.</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/music.jpg',
            'title' => 'دوره های موسیقی',
            'abstract' => 'آموزش ساز های پیانو، تار و سه تار، گیتار، سنتور و ... در موسسه فرهنگی هنری نسیم رامسر ',
            'body' => '<p>برای آشنایی با دوره های موسیقی موسسه به <a href=\"activity.php\">قسمت دوره ها</a> مراجعه کنید.</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        
        //add field
        DB::table('fields')->insert(['title'=>'کامپیوتر و برنامه نویسی']);
        DB::table('fields')->insert(['title'=>'مالی و حسابداری']);
        DB::table('fields')->insert(['title'=>'موسیقی']);
        DB::table('fields')->insert(['title'=>'هنر و صنایع دستی']);
        DB::table('fields')->insert(['title'=>'زبان']);
        
        //add teacher
        DB::table('teachers')->insert(['pic' => 'images/teachers/dr.roshan.jpg','name' => 'دکتر هادی روشن','title' => 'دانشجوی دکتری کامپیوتر و استاد دانشگاه','abstract' => 'آموزش هوش مصنوعی، طراحی الگوریتم، زبان ماشین و اسمبلی،اصول و روشها در طراحی کامپایلر، گرافیک کامپیوتری و سایر مطالب مربوطه ','description' => '<h3 class="persianFont"> فعالیت ها </h3><ul class="teacherActivity"><li><h4 class="persianFont">تدریس</h4></li><li><h4 class="persianFont">مدیریت پروژه ها</h4></li><li><h4 class="persianFont">تحلیل گر پروژه ها</h4></li><li><h4 class="persianFont"> مشاوره پروژه ها</h4></li></ul><h3 class="persianFont">تخصص ها</h3><ul class="teacherActivity"><li><h5 class="persianFont">تدریس</h5></li><li><h5 class="persianFont">مدیریت پروژه ها</h5></li><li><h5 class="persianFont">تحلیل گر پروژه ها</h5></li><li><h5 class="persianFont"> مشاوره پروژه ها</h5></li></ul>','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/golpour.jpg','name' => 'آقای گلپور','title' => 'استاد و نوازنده پیانو','abstract' => ' آموزش پیانو، سلفژ، نت خوانی و ... ','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/ebrahimian.jpg','name' => 'جناب آقای ابراهیمیان ','title' => 'استاد دانشگاه و عضو انجمن حسابداران نخبه','abstract' => 'کارشناس ارشد حسابداری، تدریس در دانشگاه های مختلف منطقه، با سابقه سه سال حسابرس موسسات حسابرسی، حسابرس سازمان امور مالیاتی کشور','description' => '','field_id' => 2]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/ghorbani.jpg','name' => 'سرکار خانم قربانی','title' => 'مدیر و موسس آموزشگاه بهارستان و استاد صنایع دستی','abstract' => 'مدیر و موسس آموزشگاه بهارستان، که از سال 1396 به منظور بالابردن کیفیت کلاس ها و استفاده از تجربیات مشترک با آموزشگاه  نسیم رامسر همکاری می کنند.','description' => '<h3 class="persianFont"> فعالیت ها </h3><ul class="teacherActivity"><li><h4 class="persianFont">آموزش چرم دوزی (کیف و کفش)</h4></li><li><h4 class="persianFont">تابلو فرش</h4></li><li><h4 class="persianFont">قلاب بافی</h4></li><li><h4 class="persianFont"> مکرومه بافی</h4></li><li><h4 class="persianFont">گبه بافی</h4></li><li><h4 class="persianFont">سبد بافی</h4></li><li><h4 class="persianFont">فرشینه</h4></li><li><h4 class="persianFont">مرمت فرش</h4></li></ul>','field_id' => 4]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/pakpour.jpg','name' => 'علی رضا پاکپور','title' => 'استاد تنبک و دف و دایره','abstract' => 'استاد علی اصغر پاکپور رودسری متولد 1335 در رودسر. در رشته تنبک نوازی فعالیت دارد و به دف نوازی و دایره نوازی نیز عشق می ورزد. شاگرداستاد علی رضا فتوحی در ارشاد تنکابن بود و بعد عا از استاد محبی و استاد بهمن رجبی در تهران فنون تنبک نوازی را فراگرفت. اکنون استاد تنبک نوازی در ادارات ارشاد شهر های تنکابن ، رامسر و چالوس می باشد.','description' => '<h3 class="persianFont"> فعالیت ها </h3><ul class="teacherActivity"><li><h4 class="persianFont">تدریس تنبک</h4></li><li><h4 class="persianFont">تدریس دف</h4></li><li><h4 class="persianFont">تدریس دایره</h4></li><li><h4 class="persianFont">اجرای کنسرت</h4></li></ul>','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/mohammadi.jpg','name' => 'استاد محمدی','title' => 'مدرس تار و سه تار','abstract' => 'مدرس تار و سه تار','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/eesapour.jpg','name' => 'استاد عیسی پور','title' => 'مدرس ویولن و کمانچه','abstract' => 'مدرس ویولن و کمانچه','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/zarrinkalam.jpg','name' => 'محسن زرین کلام','title' => 'مدرس گیتار کلاسیک','abstract' => 'مدرس گیتار کلاسیک','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/pourAsgari.jpg','name' => 'استاد پورعسگری','title' => 'مدرس اتوکد و نقشه کشی','abstract' => 'مدرس اتوکد و نقشه کشی','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/pahlavanyali.jpg','name' => ' استاد پهلوان یلی','title' => 'مدرس آرشیکد و 3D max','abstract' => 'مدرس آرشیکد و 3D max','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/aamer.jpg','name' => 'استاد عامر','title' => 'مدرس گیتار','abstract' => ' مدرس گیتار','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/maleki.jpg','name' => 'سرکار خانم ملکی','title' => 'استاد رایانه','abstract' => 'استاد رایانه','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/madadi.jpg','name' => 'مهندس مجتبی مددی مقدم','title' => 'استاد رایانه','abstract' => 'استاد رایانه','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/khalkhali.jpg','name' => 'کامران خلخالی تیسه','title' => 'کارشناسی ارشد آموزش زبان انگلیسی','abstract' => 'با بیش از 12 سال سابقه تدریس زبان انگلیسی و تور لیدری توریست های خارجی','description' => '<h3 class="persianFont">با برنامه جامع برای تقویت انواع مهارتهای:</h3><ul class="teacherActivity"><li><h4 class="persianFont">Speaking</h4></li><li><h4 class="persianFont">Writing</h4></li><li><h4 class="persianFont">Listening</h4></li><li><h4 class="persianFont">Reading</h4></li><li><h4 class="persianFont">Vocabulary & Idioms</h4></li><li><h4 class="persianFont">Grammar</h4></li><p class="persianFont">به همراه برنامه ریزی شخصی یادگیری زبان انگلیسی برای تمام مشاغل، کارمندان و همه دوستانی که تصور می کنند وقت کافی ندارند!!!</p><p class="persianFont">دیگر نگران یادگیری زبان انگلیسی نباشید. با برنامه ریزی شخصی برای هرشغل و هر شخص شما هم میتوانید به راحتی انگلیسی صحبت کنید و لذت ببرید</p>','field_id' => 5]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/rostami.jpg','name' => 'مهندس گوهر رستمی','title' => 'مدرس برنامه نویسی دستگاه های همراه و اندروید','abstract' => 'مدرس برنامه نویسی دستگاه های همراه و اندروید','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/shabanian.jpg','name' => 'محسن شعبانیان','title' => 'برنامه نویسی برنامه های تحت وب و طراحی سایت','abstract' => 'برنامه نویسی برنامه های تحت وب و طراحی سایت','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'سرکار خانم شاهنظری','title' => 'استاد رایانه','abstract' => 'استاد رایانه','description' => '','field_id' => 1]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/hayatbakhsh.jpg','name' => 'استاد حیات بخش','title' => 'استاد خوشنویسی و تحریر','abstract' => 'مدرس رسمی انجمن خوشنویسان ایران با بیش از سی سال سابقه','description' => '<h3 class="persianFont"> فعالیت ها </h3><ul class="teacherActivity"><li><h4 class="persianFont">آموزش خط نستعلیق</h4></li><li><h4 class="persianFont">آموزش شکسته نستعلیق</h4></li><li><h4 class="persianFont">آموزش نسخ</h4></li><li><h4 class="persianFont">آموزش ثلث</h4></li><li><h4 class="persianFont">آموزش خط تحریری</h4></li></ul>','field_id' => 4]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'سرکار خانم شریفی','title' => 'استاد نقاشی ','abstract' => 'استاد نقاشی ','description' => '','field_id' => 4]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'استاد دیلمی','title' => 'مدرس سنتور','abstract' => 'مدرس سنتور','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'استاد تمیمی','title' => 'مدرس سنتور','abstract' => 'مدرس سنتور','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'استاد مرادی','title' => ' مدرس ویولن و کمانچه','abstract' => ' مدرس ویولن و کمانچه','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'استاد شیدا','title' => 'استاد آواز','abstract' => 'استاد آواز','description' => '','field_id' => 3]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'استاد یوسفی','title' => 'مدرس هلو و نرم افزار های مالی','abstract' => 'مدرس هلو و نرم افزار های مالی','description' => '','field_id' => 2]);
        DB::table('teachers')->insert(['pic' => 'images/teachers/te00.jpg','name' => 'الهام کیهانی','title' => 'ارشد هنر','abstract' => '','description' => '<h3 class="persianFont">تخصص ها</h3><ul class="teacherActivity"><li><h5 class="persianFont">Corel Draw</h5></li><li><h5 class="persianFont">Adobe Illustrator</h5></li><li><h5 class="persianFont">Adobe InDesign</h5></li><li><h5 class="persianFont">Adobe Photoshop</h5></li><li><h5 class="persianFont"> و سایر نرم افزار های گرافیکی و هنری</h5></li></ul>','field_id' => 1]);
        //add course
        DB::table('courses')->insert(['pic' => 'images/courses/icdl7.jpg','title' => 'مهارت های هفتگانه','abstract' => 'آموزش مهارت های هفتگانه ICDL با مدرک سازمان فنی و حرفه ای','information' => '<dl class="dlclass"><dt>مهارت های هفتگانه ICDLشامل موارد زیر است :</dt><dd><ul><li>(IT) آشنائی با مفاهیم پایه و اساسی فناوری اطلاعات</li><li>(Windows) آشنائی با شیوه استفاده از کامپیوتر ومدیریت فایلها</li><li>(Word) شیوه به کارگیری نرم افزار واژه پرداز</li><li>(Excel) شیوه کار با صفحه گسترده</li><li>(Access) شیوه استفاده از نرم افزار پایگاه داده ها</li><li>(Powerpoint) شیوه کار با نرم افزار ارائه مطلب</li><li>(Internet) اطلاعات و ارتباطات</li></ul></dd></dl>','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/piano.jpg','title' => 'آموزش پیانو','abstract' => 'توسط استاد برجسته منطقه جناب آقای گلپور','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/leather.jpg','title' => 'آموزش چرم دوزی','abstract' => 'آموزش چرم دوزی (کیف و کفش) با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/kargah2.jpg','title' => 'کارگاه حسابداری شماره 1','abstract' => 'رایانه کار حسابداری، حسابداری صنعتی و تکمیلی، اصول 1و 2و3','information' => '','description' => '','field_id' => 2]);
        DB::table('courses')->insert(['pic' => 'images/courses/kargah1.jpg','title' => 'کارگاه حسابداری شماره 2','abstract' => 'آموزش کاربردی مفاهیم مالیاتی در بازار کار (مقدماتی و پیشرفته)','information' => '','description' => '','field_id' => 2]);
        DB::table('courses')->insert(['pic' => 'images/courses/kargah3.jpg','title' => 'کارگاه حسابداری شماره 3','abstract' => 'آموزش نرم افزار های کاربردی حسابداری (هلو، همکاران، برلیان)','information' => '','description' => '','field_id' => 2]);
        DB::table('courses')->insert(['pic' => 'images/courses/csharp.jpg','title' => 'آموزش سی شارپ','abstract' => 'دوره مقدماتی و پیشرفته با پروژه عملی','information' => '<dl class="dlclass"><dt>بخش اول:قابلیت های کلیدی زبان #C</dt><dd><ul><li>Automatic Property ها</li><li>Object Iniatializer</li><li>Collection Initialzer</li><li>Extension Method ها</li><li>استفاده از Extension Method ها در Interface ها</li><li>Delegate ها</li></ul></dd><dt>بخش دوم :تاریخچه MVC و شروع کار با MVC</dt><dd><ul><li>تاریخچه MVC</li><li>مشکلات Asp.Net WebForm</li><li>استاندارد های وب</li><li>الگوی MVC چیست ؟</li><li>مفهوم الگوی MVC</li><li>Domain Model چیست ؟</li><li>آشنایی با Design Patern ها</li><li>Model-View</li><li>Model-View-ViewModel</li><li>Model-View-Presenter</li><li>معماری MVC</li><li>چرا باید از MVC استفاده کنیم ؟</li><li>مهاجرت از WebForms به MVC</li><li>امکانات MVC 6</li><li>آشنایی با Visual Studio 2013</li><li>قالب پروژه ها</li><li>Empty</li><li>WebForms</li><li>MVC</li><li>WebApi</li><li>Single Page Application</li><li>FaceBook</li><li>نصب MVC 6</li></ul></dd><dt>بخش سوم :کار با Controller ها</dt><dd><ul><li>معرفی کنترل ها</li><li>آماده سازی پروژه</li><li>ایجاد یک کنترلر ساده</li><li>ایجاد کنترل با ارث بری از Controller</li><li>بررسی انواع کنترل</li><li>Empty</li><li>Read/Write Actions</li><li>With Views Using Entity Framework</li><li>API 2 - Empty</li><li>API 2 With Read/Write</li><li>API 2 With Actions - Using Entity Framework</li></ul></dd><dt></dt><dd><ul></ul></dd></dl>','description' => '<h5><i class="glyphicon glyphicon-calendar"></i><span class="persianFont">شروع دوره: هفته اول تیرماه</span></h5><h5><i class="glyphicon glyphicon-th-list"></i><span class="persianFont">طول دوره: 10 جلسه (دوره مقدماتی)، 10 جلسه (دوره پیشرفته)</span></h5><h5><i class="glyphicon glyphicon-blackboard"></i><span class="persianFont">نوع دوره: خصوصی، نیمه خصوصی و عمومی</span></h5><h5><i class="glyphicon glyphicon-usd"></i><span class="persianFont">شهریه دوره: بنا بر نوع تشکیل کلاس ها متفاوت می باشد</span></h5>','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/carpet.jpg','title' => 'تابلو فرش','abstract' => 'دوره های متنوع از طراحی تا بافت با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/tar.jpg','title' => 'آموزش تار و سه تار','abstract' => 'توسط استاد محمدی','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/holou.jpg','title' => 'آموزش نرم افزار هلو','abstract' => 'آموزش نرم افزر هلو به صورت عملی و کاربردی','information' => '','description' => '','field_id' => 2]);
        DB::table('courses')->insert(['pic' => 'images/courses/violon.jpg','title' => 'آموزش ویولن و کمانچه','abstract' => 'توسط استاد عیسی پور و مرادی','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/tax.jpg','title' => 'دوره های مالیاتی و حسابرسی','abstract' => 'آموزش مفاهیم و اصول حسابرسی و آشنایی با قوانی و مقررات مالیاتی','information' => '','description' => '','field_id' => 2]);
        DB::table('courses')->insert(['pic' => 'images/courses/web.jpg','title' => 'طراحی و توسعه صفحات وب','abstract' => 'آموزش مفاهیم اینترنت و شبکه، ساخت سایت، برنامه نویسی تحت وب','information' => '','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/guitar.jpg','title' => 'آموزش  گیتار','abstract' => 'توسط استاد عامر و زرین کلام','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/app.jpg','title' => 'ساخت برنامه برای تلفن همراه و تبلت','abstract' => 'آموزش ساخت نرم افزار  و بازی برای گوشی و تبلت های اندروید، IOS و ویندوز موبایلی','information' => '','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/tonbak.jpg','title' => 'آموزش تنبک و دف','abstract' => 'توسط استاد پاکپور','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/avaz.jpg','title' => 'آموزش  آواز','abstract' => 'توسط استاد شیدا','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/orf.jpg','title' => 'آموزش  موسیقی کودکان (عرف)','abstract' => 'توسط استاد گلپور','information' => '','description' => '','field_id' => 3]);
        DB::table('courses')->insert(['pic' => 'images/courses/gholab.jpg','title' => 'قلاب بافی','abstract' => 'با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/makrime.jpg','title' => 'مکرومه بافی','abstract' => 'با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/ghobe.jpg','title' => 'گبه بافی','abstract' => 'با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/sabad.jpg','title' => 'سبد بافی','abstract' => 'با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/farshine.jpg','title' => 'فرشینه','abstract' => 'با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/marmat.jpg','title' => 'مرمت فرش','abstract' => 'با مدرک رسمی از سازمان فنی و حرفه ای','information' => '','description' => '','field_id' => 4]);
        DB::table('courses')->insert(['pic' => 'images/courses/english01.jpg','title' => ' آموزش مکالمه زبان انگلیسی','abstract' => 'انواع دوره های آموزش مکالمه زبان انگلیسی و آشنایی با لهجه های مختلف انگلیسی','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/english02.jpg','title' => 'آموزش گرامر کاربردی','abstract' => 'آموزش گرامر کاربردی برای صحبت کردن و مکالمات ضروری انگلیسی','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/english03.jpg','title' => 'آموزش زبان انگلیسی برای انواع سفرهای','abstract' => 'آموزش زبان انگلیسی برای انواع سفرهای تفریحی، کاری و مسافرت های خارجی فقط در 6 ماه','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/english04.jpg','title' => 'کلاسهای مکالمات زبان انگلیسی','abstract' => 'برگزاری کلاسهای مکالمات زبان انگلیسی بصورت Free topic و Free discussion','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/english05.jpg','title' => 'کارگاه ترجمه فیلم','abstract' => 'برگزاری کارگاه ترجمه فیلمهای انگلیسی و آموزش اصطلاحات رایج در فیلم های به زبان انگلیسی','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/english06.jpg','title' => 'کلاسهای داستان خوانی انگلیسی','abstract' => 'برگزاری کلاسهای داستان خوانی انگلیسی، بررسی و تفسیر ادبی داستان و داستان نویسی انگلیسی','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/english07.jpg','title' => 'دوره آموزشی IELTS','abstract' => 'دوره های آموزشی IELTS برای IELTS General و IELTS Academic','information' => '','description' => '','field_id' => 5]);
        DB::table('courses')->insert(['pic' => 'images/courses/coreldraw.jpg','title' => 'آموزش جامع کورل دراو مقدماتی و پیشرفته','abstract' => 'از قوی ترین نرم افزارهایی است که برای ایجاد و ویرایش فایل های گرافیکی برداری، طراحی لوگو، کارت ویزیت و امور مشابه استفاده می شود.','information' => '<ul style="list-style-type: square;"><li>آشنایی با محیط و کار با ابزار Pick</li><li>کار با ابزارهای ترسیمی</li><li>کار با ابزار خط</li><li>شیوه های مختلف نمایش و مدیریت نمایش</li><li>تغییر دادن و ویرایش یک آرم رسم شده</li><li>کار با افکت ها</li><li>منوهای کاربردی</li><li>رنگ آمیزی</li></ul>','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/adobe_illustrator.jpg','title' => 'آموزش جامع ایلوستریتور مقدماتی و پیشرفته','abstract' => 'محصول ادوبی که مانند کورل دراو، برای ایجاد و ویرایش فایل های گرافیکی برداری، طراحی لوگو، کارت ویزیت و امور مشابه استفاده می شود.','information' => '','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/adobe_photoshop.jpg','title' => 'آموزش جامع فتوشاپ مقدماتی و پیشرفته','abstract' => 'محصول ادوبی که یکی از قوی ترین نرم افزارهایی است که برای کار با تصاویر دیجیتال و ویرایش آن ها استفاده می شود.','information' => '','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/Adobe_InDesign.jpg','title' => 'آموزش جامع InDesign','abstract' => 'محصول ادوبی و مناسب برای علاقه مندان به طراحی و صفحه آرائی مجله، روزنامه، سر رسید، کاتالوگ و یا حتی کتاب.','information' => '','description' => '','field_id' => 1]);
        DB::table('courses')->insert(['pic' => 'images/courses/khoshnevisi.jpg','title' => 'آموزش خوشنویسی','abstract' => 'توسط استاد حیات بخش','information' => '','description' => '<h5><i class="glyphicon glyphicon-calendar"></i><span class="persianFont">هر هفته یک شنبه ها</span></h5><h5><i class="glyphicon glyphicon-blackboard"></i><span class="persianFont">نوع دوره: خصوصی، نیمه خصوصی و عمومی</span></h5>','field_id' => 4]);
        //add teacher course
        DB::table('teacher_course')->insert(['teacher_id' => 1,'course_id' =>7]);
        DB::table('teacher_course')->insert(['teacher_id' => 1,'course_id' =>13]);
        DB::table('teacher_course')->insert(['teacher_id' => 2,'course_id' =>2]);
        DB::table('teacher_course')->insert(['teacher_id' => 2,'course_id' =>18]);
        DB::table('teacher_course')->insert(['teacher_id' => 3,'course_id' =>12]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>3]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>8]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>19]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>20]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>21]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>22]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>23]);
        DB::table('teacher_course')->insert(['teacher_id' => 4,'course_id' =>24]);
        DB::table('teacher_course')->insert(['teacher_id' => 5,'course_id' =>16]);
        DB::table('teacher_course')->insert(['teacher_id' => 6,'course_id' =>9]);
        DB::table('teacher_course')->insert(['teacher_id' => 7,'course_id' =>11]);
        DB::table('teacher_course')->insert(['teacher_id' => 8,'course_id' =>14]);
        DB::table('teacher_course')->insert(['teacher_id' => 11,'course_id' =>14]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>25]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>26]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>27]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>28]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>29]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>30]);
        DB::table('teacher_course')->insert(['teacher_id' => 14,'course_id' =>31]);
        DB::table('teacher_course')->insert(['teacher_id' => 15,'course_id' =>15]);
        DB::table('teacher_course')->insert(['teacher_id' => 16,'course_id' =>7]);
        DB::table('teacher_course')->insert(['teacher_id' => 16,'course_id' =>13]);
        DB::table('teacher_course')->insert(['teacher_id' => 18,'course_id' =>36]);
        DB::table('teacher_course')->insert(['teacher_id' => 23,'course_id' =>17]);
        DB::table('teacher_course')->insert(['teacher_id' => 24,'course_id' =>10]);
        DB::table('teacher_course')->insert(['teacher_id' => 25,'course_id' =>32]);
        DB::table('teacher_course')->insert(['teacher_id' => 25,'course_id' =>33]);
        DB::table('teacher_course')->insert(['teacher_id' => 25,'course_id' =>34]);
        DB::table('teacher_course')->insert(['teacher_id' => 25,'course_id' =>35]);


        // DB::table('posts')->insert([
        //     'pic' => '',
        //     'name' => '',
        //     'title' => '',
        //     'abstract' => '',
        //     'description' => '',
        //     'field_id' => ''
        // ]);
    }
}
