<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentPartnerSeeder extends Seeder
{
    /**
     * Seed the department_partner pivot table.
     * 
     * Department IDs: 1=TKR, 2=TKJ, 3=AP, 4=TLM, 5=DPIB, 6=TP
     * Partner IDs: 1=Telkom, 2=Diskominfo, 3=Astra Honda, 4=Manufaktur, 5=Lab Klinik, 6=Konstruksi, 7=Pertani
     */
    public function run(): void
    {
        $pairs = [
            ['department_id' => 1, 'partner_id' => 3], // TKR → Astra Honda
            ['department_id' => 2, 'partner_id' => 1], // TKJ → Telkom
            ['department_id' => 2, 'partner_id' => 2], // TKJ → Diskominfo
            ['department_id' => 3, 'partner_id' => 7], // AP → Pertani
            ['department_id' => 4, 'partner_id' => 5], // TLM → Lab Klinik
            ['department_id' => 5, 'partner_id' => 6], // DPIB → Konstruksi
            ['department_id' => 6, 'partner_id' => 4], // TP → Manufaktur
        ];

        DB::table('department_partner')->insert($pairs);
    }
}
