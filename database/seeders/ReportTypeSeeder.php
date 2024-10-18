<?php

namespace Database\Seeders;

use App\Models\ReportType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reportTypes = [
            'تسرب مياه',
            'انقطاع كهرباء',
            'إضاءة الشوارع المعطلة',
            'حفر في الطرق',
            'إشارة مرور معطلة',
            'تكدس النفايات',
            'إزعاج الضوضاء',
            'أضرار بالحدائق العامة',
            'تسريب مياه الصرف الصحي',
            'حيوانات ضالة'
        ];

        for ($i = 0; $i < 10; $i++) {
            ReportType::factory()->create([
               'name' => $reportTypes[$i]
            ]);
        }
    }
}
