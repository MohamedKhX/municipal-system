<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // License Requests
        RequestType::factory()->create([
            'name' => 'رخصة قيادة',
            'type' => \App\Enums\RequestType::License,
            'requirements' => [
                ['item' => 'صورة من جواز السفر'],
                ['item' => 'فحص طبي'],
                ['item' => 'نسخة من الإقامة']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة بناء',
            'type' => \App\Enums\RequestType::License,
            'requirements' => [
                ['item' => 'تصميم هندسي معتمد'],
                ['item' => 'نسخة من عقد الملكية']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة تجارية',
            'type' => \App\Enums\RequestType::License,
            'requirements' => [
                ['item' => 'نسخة من السجل التجاري'],
                ['item' => 'شهادة عدم ممانعة من البلدية'],
                ['item' => 'نسخة من الهوية الوطنية']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة تشغيل منشأة',
            'type' => \App\Enums\RequestType::License,
            'requirements' => [
                ['item' => 'تفتيش من الدفاع المدني'],
                ['item' => 'تصريح من البلدية'],
                ['item' => 'شهادة الصحة العامة']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة قيادة مركبة ثقيلة',
            'type' => \App\Enums\RequestType::License,
            'requirements' => [
                ['item' => 'شهادة تدريب من مدرسة قيادة معتمدة'],
                ['item' => 'فحص طبي']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة سياقة دراجة نارية',
            'type' => \App\Enums\RequestType::License,
            'requirements' => [
                ['item' => 'شهادة تدريب من مدرسة قيادة'],
                ['item' => 'فحص نظر']
            ]
        ]);

// Permit Requests
        RequestType::factory()->create([
            'name' => 'تصريح حفر',
            'type' => \App\Enums\RequestType::Permit,
            'requirements' => [
                ['item' => 'موافقة من شركة المياه'],
                ['item' => 'خطة الحفر المعتمدة']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح إشغال',
            'type' => \App\Enums\RequestType::Permit,
            'requirements' => [
                ['item' => 'خطة استخدام الأراضي'],
                ['item' => 'موافقة البلدية']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح تظاهرة',
            'type' => \App\Enums\RequestType::Permit,
            'requirements' => [
                ['item' => 'خطة أمنية معتمدة'],
                ['item' => 'موافقة من الجهات الأمنية']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح إغلاق طريق',
            'type' => \App\Enums\RequestType::Permit,
            'requirements' => [
                ['item' => 'خطة تحويل مرور'],
                ['item' => 'موافقة من الجهات المختصة']
            ]
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح استخدام سلاح ناري',
            'type' => \App\Enums\RequestType::Permit,
            'requirements' => [
                ['item' => 'تقرير طبي'],
                ['item' => 'موافقة وزارة الداخلية']
            ]
        ]);

    }
}
