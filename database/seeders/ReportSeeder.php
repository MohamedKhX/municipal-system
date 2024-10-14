<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            $report = Report::factory()->create([
                'title' => fake()->randomElement([
                    'تسرب مياه في الشارع الرئيسي',
                    'انقطاع الكهرباء في الحي الشمالي',
                    'حفرة كبيرة في الطريق المؤدي إلى المدرسة',
                    'إشارة مرور معطلة في شارع النخيل',
                    'إلقاء نفايات بشكل غير قانوني في الحديقة العامة',
                    'إضاءة الشارع معطلة في حي الزهور'
                ]),
                'description' => fake()->randomElement([
                    'تم ملاحظة تسرب مياه مستمر في الشارع الرئيسي بالقرب من محطة الوقود.',
                    'انقطاع الكهرباء في عدة منازل بالحي الشمالي منذ يوم أمس وحتى الآن.',
                    'يوجد حفرة كبيرة في الطريق المؤدي إلى المدرسة، مما يشكل خطرًا على السائقين.',
                    'إشارة المرور في شارع النخيل متوقفة عن العمل منذ صباح اليوم، مما يسبب ازدحامًا مروريًا.',
                    'تم إلقاء نفايات بشكل غير قانوني في الحديقة العامة، وتشكل هذه النفايات خطرًا على البيئة.',
                    'إضاءة الشارع في حي الزهور لا تعمل منذ ثلاثة أيام، والشارع أصبح مظلمًا تمامًا.'
                ]),
                'street' => fake()->randomElement([
                    'الشارع الرئيسي',
                    'شارع النخيل',
                    'شارع الزهور',
                    'شارع 15',
                    'شارع الملك فيصل',
                    'شارع الحديقة'
                ])
            ]);

            $report->addMediaFromUrl(fake()->randomElement([
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
