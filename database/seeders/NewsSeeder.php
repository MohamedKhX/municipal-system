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
        for ($i = 0; $i < 6; $i++) {
            $news = News::factory()->create([
                'title' => fake()->randomElement([
                    'افتتاح مشروع جديد لتطوير البنية التحتية',
                    'حملة تنظيف الشوارع تستهدف الأحياء الجنوبية',
                    'إطلاق تطبيق جديد للإبلاغ عن الأعطال',
                    'مبادرة جديدة لزيادة الوعي البيئي',
                    'إصلاحات الطرق السريعة تبدأ الأسبوع القادم',
                    'إغلاق مؤقت للطرق بسبب أعمال الصيانة',
                    'افتتاح منتزه جديد في وسط المدينة',
                    'تحديث نظام الإضاءة العامة في الأحياء الشمالية',
                    'بدء تسجيل المواطنين لطلب تصاريح البناء',
                    'حملة التوعية بأهمية تدوير النفايات تبدأ غدًا'
                ]),
                'body' => fake()->randomElement([
                    'أعلنت البلدية اليوم عن افتتاح مشروع تطوير البنية التحتية الذي يستهدف تحسين الطرق والمرافق العامة.',
                    'قامت البلدية بإطلاق حملة تنظيف الشوارع والتي تشمل إزالة النفايات وزراعة الأشجار في الأحياء الجنوبية.',
                    'أطلقت البلدية تطبيقًا جديدًا يمكن المواطنين من الإبلاغ عن الأعطال والمشاكل في المناطق العامة بسهولة.',
                    'بدأت البلدية بمبادرة لزيادة الوعي حول أهمية الحفاظ على البيئة والتشجير في المناطق العامة.',
                    'من المقرر أن تبدأ البلدية في إصلاحات الطرق السريعة لتحسين البنية التحتية وتخفيف الازدحام المروري.',
                    'تعلن البلدية عن إغلاق مؤقت لبعض الطرق لإجراء أعمال الصيانة وإعادة تأهيل البنية التحتية.',
                    'تعلن البلدية عن افتتاح منتزه جديد يوفر مساحات خضراء واسعة وساحات لعب للأطفال في وسط المدينة.',
                    'البلدية تبدأ بتحديث نظام الإضاءة العامة في الأحياء الشمالية لتحسين الإنارة وتقليل استهلاك الطاقة.',
                    'البلدية تدعو المواطنين إلى بدء عملية التسجيل للحصول على تصاريح البناء للمشاريع السكنية الجديدة.',
                    'أعلنت البلدية عن انطلاق حملة التوعية التي تستهدف تشجيع المواطنين على إعادة تدوير النفايات وحماية البيئة.'
                ])
            ]);

            $news->addMediaFromUrl(fake()->randomElement([
                'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmV3c3xlbnwwfHwwfHx8MA%3D%3D',
                'https://images.unsplash.com/photo-1557992260-ec58e38d363c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1560177112-fbfd5fde9566?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzF8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1498049860654-af1a5c566876?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ]))->toMediaCollection('thumbnails');
        }
    }
}
