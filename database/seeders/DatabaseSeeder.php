<?php

namespace Database\Seeders;

use App\Models\Municipality;
use App\Models\News;
use App\Models\Report;
use App\Models\Request;
use App\Models\RequestType;
use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \Artisan::call('permission:seed');

        $this->call(MunicipalitySeeder::class);

        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => \Hash::make('password'),
            'municipality_id' => 1
        ]);

        $user->assignRole('admin');

      /*  $this->call(NewsSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ReportTypeSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(RequestTypeSeeder::class);
        $this->call(RequestSeeder::class);*/
    }

}
