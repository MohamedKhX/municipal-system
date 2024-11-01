<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post1 = News::factory()->create([
            'title' => 'افتتاح مشروع جديد لتطوير البنية التحتية',
            'body' => 'أعلنت البلدية اليوم عن افتتاح مشروع تطوير البنية التحتية الذي يستهدف تحسين الطرق والمرافق العامة.',
        ]);

        $post1
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1664695369075-90d9165b5034?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8JUQ4JUE3JUQ5JTg0JUQ4JUE4JUQ5JTg2JUQ5JThBJUQ4JUE5JTIwJUQ4JUE3JUQ5JTg0JUQ4JUFBJUQ4JUFEJUQ4JUFBJUQ5JThBJUQ4JUE5fGVufDB8fDB8fHww')->toMediaCollection('thumbnails');


        $post2 = News::factory()->create([
            'title' => 'حملة تنظيف الشوارع تستهدف الأحياء الجنوبية',
            'body' => 'قامت البلدية بإطلاق حملة تنظيف الشوارع والتي تشمل إزالة النفايات وزراعة الأشجار في الأحياء الجنوبية.',
        ]);

        $post2
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1663089500161-42a457d95a89?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8JUQ4JUFEJUQ5JTg1JUQ5JTg0JUQ4JUE5JTIwJUQ4JUFBJUQ5JTg2JUQ4JUI4JUQ5JThBJUQ5JTgxfGVufDB8fDB8fHww')->toMediaCollection('thumbnails');

        $post3 = News::factory()->create([
            'title' => 'إطلاق تطبيق جديد للإبلاغ عن الأعطال',
            'body' => 'أطلقت البلدية تطبيقًا جديدًا يمكن المواطنين من الإبلاغ عن الأعطال والمشاكل في المناطق العامة بسهولة.',
        ]);

        $post3
            ->addMediaFromUrl('https://images.unsplash.com/photo-1590935217281-8f102120d683?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')->toMediaCollection('thumbnails');

        $post4 = News::factory()->create([
            'title' => 'مبادرة جديدة لزيادة الوعي البيئي',
            'body' => 'بدأت البلدية بمبادرة لزيادة الوعي حول أهمية الحفاظ على البيئة والتشجير في المناطق العامة.',
        ]);

        $post4
            ->addMediaFromUrl('https://images.unsplash.com/photo-1622219970016-09f07c1eed36?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8RW52aXJvbm1lbnRhbCUyMGF3YXJlbmVzc3xlbnwwfHwwfHx8MA%3D%3D')->toMediaCollection('thumbnails');


        $post5 = News::factory()->create([
            'title' => 'إصلاحات الطرق السريعة تبدأ الأسبوع القادم',
            'body' => 'من المقرر أن تبدأ البلدية في إصلاحات الطرق السريعة لتحسين البنية التحتية وتخفيف الازدحام المروري.',
        ]);

        $post5
            ->addMediaFromUrl('https://images.unsplash.com/photo-1650594117259-c7de8db862d4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Um9hZCUyMHJlcGFpcnN8ZW58MHx8MHx8fDA%3D')->toMediaCollection('thumbnails');


        $post6 = News::factory()->create([
            'title' => 'إغلاق مؤقت للطرق بسبب أعمال الصيانة',
            'body' => 'تعلن البلدية عن إغلاق مؤقت لبعض الطرق لإجراء أعمال الصيانة وإعادة تأهيل البنية التحتية.',
        ]);

        $post6
            ->addMediaFromUrl('https://images.unsplash.com/photo-1465447142348-e9952c393450?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8VGVtcG9yYXJ5JTIwcm9hZCUyMGNsb3N1cmVzfGVufDB8fDB8fHww')->toMediaCollection('thumbnails');

        $post7 = News::factory()->create([
            'title' => 'افتتاح منتزه جديد في وسط المدينة',
            'body' => 'تعلن البلدية عن افتتاح منتزه جديد يوفر مساحات خضراء واسعة وساحات لعب للأطفال في وسط المدينة.',
        ]);

        $post7
            ->addMediaFromUrl('https://images.unsplash.com/photo-1622050956578-94fd044a0ada?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8UGFya3xlbnwwfHwwfHx8MA%3D%3D')->toMediaCollection('thumbnails');

        $post8 = News::factory()->create([
            'title' => 'تحديث نظام الإضاءة العامة في الأحياء الشمالية',
            'body' => 'البلدية تبدأ بتحديث نظام الإضاءة العامة في الأحياء الشمالية لتحسين الإنارة وتقليل استهلاك الطاقة.',
        ]);

        $post8
            ->addMediaFromUrl('https://images.unsplash.com/photo-1523376460408-aeb5f5d051b8?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8TGlnaHRpbmd8ZW58MHx8MHx8fDA%3D')->toMediaCollection('thumbnails');

        $post9 = News::factory()->create([
            'title' => 'بدء تسجيل المواطنين لطلب تصاريح البناء',
            'body' => 'البلدية تدعو المواطنين إلى بدء عملية التسجيل للحصول على تصاريح البناء للمشاريع السكنية الجديدة.',
        ]);

        $post9
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1661498005837-680e8bfcd60e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8QnVpbGRpbmclMjBwZXJtaXRzfGVufDB8fDB8fHww')->toMediaCollection('thumbnails');

        $post10 = News::factory()->create([
            'title' => 'حملة التوعية بأهمية تدوير النفايات تبدأ غدًا',
            'body' => 'أعلنت البلدية عن انطلاق حملة التوعية التي تستهدف تشجيع المواطنين على إعادة تدوير النفايات وحماية البيئة.',
        ]);

        $post10
            ->addMediaFromUrl('https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8V2FzdGUlMjByZWN5Y2xpbmd8ZW58MHx8MHx8fDA%3D')->toMediaCollection('thumbnails');
    }
}
