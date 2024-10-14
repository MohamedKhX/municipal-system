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
        RequestType::factory()->create([
            'name' => 'رخصة قيادة',
            'type' => \App\Enums\RequestType::License,
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة بناء',
            'type' => \App\Enums\RequestType::License,
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة تجارية',
            'type' => \App\Enums\RequestType::License,
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح حفر',
            'type' => \App\Enums\RequestType::Permit,
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح إشغال',
            'type' => \App\Enums\RequestType::Permit,
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة تشغيل منشأة',
            'type' => \App\Enums\RequestType::License,
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح تظاهرة',
            'type' => \App\Enums\RequestType::Permit,
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة قيادة مركبة ثقيلة',
            'type' => \App\Enums\RequestType::License,
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح إغلاق طريق',
            'type' => \App\Enums\RequestType::Permit,
        ]);

        RequestType::factory()->create([
            'name' => 'رخصة سياقة دراجة نارية',
            'type' => \App\Enums\RequestType::License,
        ]);

        RequestType::factory()->create([
            'name' => 'تصريح استخدام سلاح ناري',
            'type' => \App\Enums\RequestType::Permit,
        ]);
    }
}
