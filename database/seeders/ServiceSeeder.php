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
        $service1 = Service::factory()->create([
            'name' => 'خدمة إصدار تراخيص البناء',
            'description' => 'تتيح هذه الخدمة للمواطنين إصدار تراخيص البناء للمشاريع السكنية والتجارية.'
        ]);

        $service1
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1663045854370-1aa3d652b179?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')->toMediaCollection('thumbnails');

        $service2 = Service::factory()->create([
            'name' => 'خدمة تصاريح الحفريات',
            'description' => 'تمكن هذه الخدمة الشركات والمقاولين من الحصول على تصاريح لحفر الطرق والصيانة.'
        ]);

        $service2
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1682142169420-d0ef7507ef01?q=80&w=2686&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')->toMediaCollection('thumbnails');

        $service3 = Service::factory()->create([
            'name' => 'خدمة جمع النفايات',
            'description' => 'توفر البلدية خدمة جمع النفايات من الأحياء بشكل دوري لضمان النظافة العامة.'
        ]);

        $service3
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1661573708898-85a03aa619ad?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')->toMediaCollection('thumbnails');

        $service4 = Service::factory()->create([
            'name' => 'خدمة صيانة الطرق',
            'description' => 'تقدم هذه الخدمة صيانة دورية وإصلاحات للطرق المتضررة لضمان سلامة الطرق.'
        ]);

        $service4
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1687948155996-8fe64cd74c02?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Um9hZCUyMG1haW50ZW5hbmNlJTIwc2VydmljZXxlbnwwfHwwfHx8MA%3D%3D')->toMediaCollection('thumbnails');

        $service5 = Service::factory()->create([
            'name' => 'خدمة الإضاءة العامة',
            'description' => 'تتعلق هذه الخدمة بصيانة وتحسين الإضاءة العامة في الشوارع والأحياء.'
        ]);

        $service5
            ->addMediaFromUrl('https://images.unsplash.com/photo-1523376460408-aeb5f5d051b8?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')->toMediaCollection('thumbnails');

        $service6 = Service::factory()->create([
            'name' => 'خدمة التشجير وزيادة المساحات الخضراء',
            'description' => 'تهدف هذه الخدمة إلى زراعة الأشجار وزيادة المساحات الخضراء في المدينة.'
        ]);

        $service6
            ->addMediaFromUrl('https://plus.unsplash.com/premium_photo-1681140560806-928e8b9a9a20?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fFRyZWUlMjBzZXJ2aWNlJTIwYW5kJTIwaW5jcmVhc2luZyUyMGdyZWVuJTIwc3BhY2VzfGVufDB8fDB8fHww')->toMediaCollection('thumbnails');

        /*$service->addMediaFromUrl(fake()->randomElement([
            'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmV3c3xlbnwwfHwwfHx8MA%3D%3D',
            'https://images.unsplash.com/photo-1557992260-ec58e38d363c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fG5ld3N8ZW58MHx8MHx8fDA%3D',
            'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fG5ld3N8ZW58MHx8MHx8fDA%3D',
            'https://images.unsplash.com/photo-1560177112-fbfd5fde9566?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzF8fG5ld3N8ZW58MHx8MHx8fDA%3D',
            'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fG5ld3N8ZW58MHx8MHx8fDA%3D',
            'https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTF8fG5ld3N8ZW58MHx8MHx8fDA%3D',
            'https://images.unsplash.com/photo-1498049860654-af1a5c566876?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]))->toMediaCollection('thumbnails');*/
    }
}
