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
            $request->addMediaFromUrl(fake()->randomElement([
                'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmV3c3xlbnwwfHwwfHx8MA%3D%3D',
                'https://images.unsplash.com/photo-1557992260-ec58e38d363c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1560177112-fbfd5fde9566?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzF8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fG5ld3N8ZW58MHx8MHx8fDA%3D',
                'https://images.unsplash.com/photo-1498049860654-af1a5c566876?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ]))->toMediaCollection('userAttachments');
        }
    }
}
