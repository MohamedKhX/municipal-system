<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $service = Service::factory()->create([
                'name' => fake()->randomElement([
                    'خدمة إصدار تراخيص البناء',
                    'خدمة تصاريح الحفريات',
                    'خدمة جمع النفايات',
                    'خدمة صيانة الطرق',
                    'خدمة الإضاءة العامة',
                    'خدمة التشجير وزيادة المساحات الخضراء'
                ]),
                'description' => fake()->randomElement([
                    'تتيح هذه الخدمة للمواطنين إصدار تراخيص البناء للمشاريع السكنية والتجارية.',
                    'تمكن هذه الخدمة الشركات والمقاولين من الحصول على تصاريح لحفر الطرق والصيانة.',
                    'توفر البلدية خدمة جمع النفايات من الأحياء بشكل دوري لضمان النظافة العامة.',
                    'تقدم هذه الخدمة صيانة دورية وإصلاحات للطرق المتضررة لضمان سلامة الطرق.',
                    'تتعلق هذه الخدمة بصيانة وتحسين الإضاءة العامة في الشوارع والأحياء.',
                    'تهدف هذه الخدمة إلى زراعة الأشجار وزيادة المساحات الخضراء في المدينة.'
                ])
            ]);

            $service->addMediaFromUrl(fake()->randomElement([
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
