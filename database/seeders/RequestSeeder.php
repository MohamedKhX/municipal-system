<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $request = Request::factory()->create([
                'first_name' => fake()->randomElement([
                    'محمد',
                    'أحمد',
                    'خالد',
                    'عبدالله',
                    'سعيد',
                    'يوسف'
                ]),
                'middle_name' => fake()->randomElement([
                    'بن علي',
                    'بن سعيد',
                    'بن عبدالله',
                    'بن محمد',
                    'بن ناصر',
                    'بن خالد'
                ]),
                'last_name' => fake()->randomElement([
                    'التميمي',
                    'العتيبي',
                    'القحطاني',
                    'الشمراني',
                    'الدوسري',
                    'الحربي'
                ]),
                'subject' => fake()->randomElement([
                    'طلب تصريح بناء',
                    'طلب رخصة قيادة',
                    'استفسار عن خدمة',
                    'طلب تصريح حفريات',
                    'تقديم شكوى',
                    'طلب رخصة تجارية'
                ]),
                'message' => fake()->randomElement([
                    'أود التقدم بطلب للحصول على تصريح بناء لمشروع سكني في حي النخيل.',
                    'أرغب في استفسار عن كيفية الحصول على رخصة قيادة جديدة.',
                    'أرغب في معرفة المزيد من التفاصيل حول خدمة البلدية المقدمة في حي الزهور.',
                    'أحتاج إلى تصريح حفريات لتنفيذ أعمال الصيانة في شارع الملك فيصل.',
                    'أود تقديم شكوى بخصوص التأخير في معالجة طلب سابق.',
                    'أرغب في التقدم بطلب للحصول على رخصة تجارية لإنشاء متجر جديد.'
                ])
            ]);

        }
    }
}
