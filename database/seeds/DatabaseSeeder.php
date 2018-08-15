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
        //add post
        DB::table('posts')->insert([
            'pic' => 'images/news/modem.jpg',
            'title' => 'عرضه مودم نسل چهارم',
            'abstract' => 'مودم نسل چهارم اینترنت آسیاتک (LTE) در فروشگاه نسیم رایانه عرضه می گردد.',
            'body' => '<p>\r\nبا امکان اتصال به رایانه و اینترنت بیسیم (wifi) برای اتصال به تلفن همراه، در محل فروشگاه نسیم رایانه عرضه می شود.\r\n</p>',
            'subject_id'=>4,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/web.jpg',
            'title' => 'دوره های برنامه نویسی',
            'abstract' => 'ثبت نام دوره های تابستانه کلاس های برنامه نویسی',
            'body' => '<p>\r\nآموزش برنامه نویسی تلفن های همراه و دستگاه های همراه، آموزش طراحی صفحات وب، طراحی پایگاه های داده و ساخت نرم افزار های مختلف به کمک تکنولوژی های جدید در موسسه فرهنگی هنری نسیم رامسر ادامه دارد.\r\n</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/kargah2.jpg',
            'title' => 'کارگاه های حسابداری',
            'abstract' => 'ثبت نام کارگاه های جدید حسابداری و مالی، با تدریس استاد ابراهیمیان و ... آغاز گردید .',
            'body' => '<p>\r\nثبت نام کار گاه های حسابداری مقدماتی و پیشرفته، مسائل مالی و حسابداری و مالیاتی و همچنین آموزش نرم افزار مالی در موسسه نسیم شروع شد.\r\n</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/carpet.jpg',
            'title' => 'کلاس های صنایع دستی',
            'abstract' => 'ثبت نام دوره های جدید کلاس های قالی بافی، چرم دوزی و ... با تدریس استاد سرکار خانم قربانی آغاز گردید .',
            'body' => '<p>\r\nدوره ها همراه با  اساتید مجرب و کار عملی در با همکاری موسسه بهارستان برگزار می شود.\r\n</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/orf.jpg',
            'title' => 'دوره موسیقی کودکان',
            'abstract' => 'ثبت نام دوره های جدید موسیقی کودکان با تدریس استاد گلپور شروع شد.',
            'body' => '<p>\r\nثبت نام دوره های تابستانه موسیقی کودکان همراه با آموزش شناخت آواهای مختلف، شناخت نت ها و ساز های مختلف با تدریس استاد گلپور در موسسه فرهنگی و هنری رامسر آغاز گردید.\r\n</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
        DB::table('posts')->insert([
            'pic' => 'images/news/music.jpg',
            'title' => 'دوره های موسیقی',
            'abstract' => 'آموزش ساز های پیانو، تار و سه تار، گیتار، سنتور و ... در موسسه فرهنگی هنری نسیم رامسر ',
            'body' => '<p>\r\nبرای آشنایی با دوره های موسیقی موسسه به <a href=\"activity.php\">قسمت دوره ها</a> مراجعه کنید.\r\n</p>',
            'subject_id'=>1,
            'user_id'=>1
        ]);
    }
}
