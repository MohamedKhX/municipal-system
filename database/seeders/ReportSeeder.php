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
        $report1 = Report::factory()->create([
            'title' => 'تسرب مياه في الشارع الرئيسي',
            'description' => 'تم ملاحظة تسرب مياه مستمر في الشارع الرئيسي بالقرب من محطة الوقود.',
            'street' => 'الشارع الرئيسي'
        ]);

        $report1
            ->addMediaFromUrl('https://images.unsplash.com/photo-1620631049586-2670d39a1cef?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8V2F0ZXIlMjBsZWFrYWdlfGVufDB8fDB8fHww')->toMediaCollection('thumbnails');


        $report2 = Report::factory()->create([
            'title' => 'انقطاع الكهرباء في الحي الشمالي',
            'description' => 'انقطاع الكهرباء في عدة منازل بالحي الشمالي منذ يوم أمس وحتى الآن.',
            'street' => 'شارع النخيل'
        ]);

        $report2
            ->addMediaFromUrl('https://images.unsplash.com/photo-1599406919397-563a62b43058?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8UG93ZXIlMjBvdXRhZ2V8ZW58MHx8MHx8fDA%3D')->toMediaCollection('thumbnails');

        $report3 = Report::factory()->create([
            'title' => 'حفرة كبيرة في الطريق المؤدي إلى المدرسة',
            'description' => 'يوجد حفرة كبيرة في الطريق المؤدي إلى المدرسة، مما يشكل خطرًا على السائقين.',
            'street' => 'شارع الزهور'
        ]);

        $report3
            ->addMediaFromUrl('https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')->toMediaCollection('thumbnails');

        $report4 = Report::factory()->create([
            'title' => 'إشارة مرور معطلة في شارع النخيل',
            'description' => 'إشارة المرور في شارع النخيل متوقفة عن العمل منذ صباح اليوم، مما يسبب ازدحامًا مروريًا.',
            'street' => 'شارع 15'
        ]);

        $report4
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1673686834997-496b6f82736e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8QSUyMGJyb2tlbiUyMHRyYWZmaWMlMjBsaWdodHxlbnwwfHwwfHx8MA%3D%3D')->toMediaCollection('thumbnails');

        $report5 = Report::factory()->create([
            'title' => 'إلقاء نفايات بشكل غير قانوني في الحديقة العامة',
            'description' => 'تم إلقاء نفايات بشكل غير قانوني في الحديقة العامة، وتشكل هذه النفايات خطرًا على البيئة.',
            'street' => 'شارع الملك فيصل'
        ]);

        $report5
            ->addMediaFromUrl('https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8anVua3xlbnwwfHwwfHx8MA%3D%3D')->toMediaCollection('thumbnails');

        $report6 = Report::factory()->create([
            'title' => 'إضاءة الشارع معطلة في حي الزهور',
            'description' => 'إضاءة الشارع في حي الزهور لا تعمل منذ ثلاثة أيام، والشارع أصبح مظلمًا تمامًا.',
            'street' => 'شارع الحديقة'
        ]);

        $report6
            ->addMediaFromUrl('https://images.unsplash.com/photo-1559406041-c7d2b2e98690?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8VGhlJTIwc3RyZWV0JTIwbGlnaHRpbmclMjBpcyUyMG91dCUyMG9mJTIwb3JkZXJ8ZW58MHx8MHx8fDA%3D')->toMediaCollection('thumbnails');


        $reports = Report::all();
        foreach ($reports as $report) {
            $report
                ->addMediaFromUrl('https://images.unsplash.com/photo-1559406041-c7d2b2e98690?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8VGhlJTIwc3RyZWV0JTIwbGlnaHRpbmclMjBpcyUyMG91dCUyMG9mJTIwb3JkZXJ8ZW58MHx8MHx8fDA%3D')
                ->toMediaCollection('media');

            $report
                ->addMediaFromUrl('https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8anVua3xlbnwwfHwwfHx8MA%3D%3D')
                ->toMediaCollection('media');

            $report
                ->addMediaFromUrl('https://images.unsplash.com/photo-1620631049586-2670d39a1cef?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8V2F0ZXIlMjBsZWFrYWdlfGVufDB8fDB8fHww')
                ->toMediaCollection('media');
        }
    }
}
