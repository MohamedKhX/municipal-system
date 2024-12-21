<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipalities = [
            [
                'name' => 'طرابلس المركز',
                'boundary' => json_encode([
                    [32.91193732849022, 13.23705383828025],
                    [32.8251400945433, 13.267266241556028],
                    [32.82759234472029, 13.183323825636391],
                    [32.91496360502088, 13.160492861797309],
                    [32.9122255497601, 13.237225499662497],
                ]),
            ],
            [
                'name' => 'تاجوراء',
                'boundary' => json_encode([
                    [32.9051678791223, 13.298029790991608],
                    [32.729164766199645, 13.30832947392653],
                    [32.80884214768972, 13.55620850989372],
                    [32.905744364799986, 13.300776373107587],
                ]),
            ],
            [
                'name' => 'سوق الجمعة',
                'boundary' => json_encode([
                    [32.9085039747949, 13.215305347886256],
                    [32.84622378215963, 13.235904713756106],
                    [32.869872341167614, 13.305942557713593],
                    [32.91657412862227, 13.306972526007085],
                    [32.9085039747949, 13.21599199341525],
                ]),
            ],
        ];


        foreach ($municipalities as &$municipality) {
            $decodedBoundary = json_decode($municipality['boundary'], true);
            $transformedBoundary = array_map(function ($point) {
                return [
                    'latitude' => (string)$point[0],
                    'longitude' => (string)$point[1],
                ];
            }, $decodedBoundary);

            $municipality['boundary'] = json_encode($transformedBoundary);
        }

        foreach ($municipalities as $data) {
            Municipality::create($data);
        }
    }
}
