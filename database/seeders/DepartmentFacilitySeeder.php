<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentFacilitySeeder extends Seeder
{
    /**
     * Seed the department_facility pivot table.
     * Maps departments to their facilities.
     * 
     * Department IDs:
     *   1 => TKR, 2 => TKJ, 3 => AP, 4 => TLM, 5 => DPIB, 6 => TP
     * Facility IDs:
     *   1 => Lab TLM, 2 => Bengkel TKR, 3 => Bengkel TP, 4 => Lab Komputer
     *   5 => Lab DPIB, 6 => Lahan Pertanian, 7 => Lapangan, 8 => Perpustakaan
     *   9 => UKS, 10 => Musala
     */
    public function run(): void
    {
        $pairs = [
            // TKR
            ['department_id' => 1, 'facility_id' => 2],
            ['department_id' => 1, 'facility_id' => 8],
            // TKJ
            ['department_id' => 2, 'facility_id' => 4],
            ['department_id' => 2, 'facility_id' => 8],
            // AP
            ['department_id' => 3, 'facility_id' => 6],
            ['department_id' => 3, 'facility_id' => 8],
            // TLM
            ['department_id' => 4, 'facility_id' => 1],
            ['department_id' => 4, 'facility_id' => 8],
            // DPIB
            ['department_id' => 5, 'facility_id' => 5],
            ['department_id' => 5, 'facility_id' => 8],
            // TP
            ['department_id' => 6, 'facility_id' => 3],
            ['department_id' => 6, 'facility_id' => 8],
            // General - Lapangan Olahraga
            ['department_id' => 1, 'facility_id' => 7],
            ['department_id' => 2, 'facility_id' => 7],
            ['department_id' => 3, 'facility_id' => 7],
            ['department_id' => 4, 'facility_id' => 7],
            ['department_id' => 5, 'facility_id' => 7],
            ['department_id' => 6, 'facility_id' => 7],
            // General - UKS
            ['department_id' => 1, 'facility_id' => 9],
            ['department_id' => 2, 'facility_id' => 9],
            ['department_id' => 3, 'facility_id' => 9],
            ['department_id' => 4, 'facility_id' => 9],
            ['department_id' => 5, 'facility_id' => 9],
            ['department_id' => 6, 'facility_id' => 9],
            // General - Musala
            ['department_id' => 1, 'facility_id' => 10],
            ['department_id' => 2, 'facility_id' => 10],
            ['department_id' => 3, 'facility_id' => 10],
            ['department_id' => 4, 'facility_id' => 10],
            ['department_id' => 5, 'facility_id' => 10],
            ['department_id' => 6, 'facility_id' => 10],
        ];

        DB::table('department_facility')->insert($pairs);
    }
}
