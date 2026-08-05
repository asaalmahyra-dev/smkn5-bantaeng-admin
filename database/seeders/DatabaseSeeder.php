<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Create admin user (manual to avoid faker dependency in production)
        // Idempotent: skip if the admin already exists (prevents UNIQUE constraint violation on users.email)
        User::firstOrCreate(
            ['email' => 'admin@smkn5bantaeng.sch.id'],
            [
                'name' => 'Admin SMKN 5 Bantaeng',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ]
        );

        $this->call([
            NewsCategorySeeder::class,
            DepartmentSeeder::class,
            TeacherSeeder::class,
            FacilitySeeder::class,
            PartnerSeeder::class,
            DepartmentFacilitySeeder::class,
            DepartmentPartnerSeeder::class,
            NewsSeeder::class,
            GallerySeeder::class,
            AchievementSeeder::class,
            ExtracurricularSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            PpdbConfigSeeder::class,
        ]);
    }
}
