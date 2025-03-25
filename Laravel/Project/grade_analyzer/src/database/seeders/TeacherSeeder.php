<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'first_name' => 'Sandip',
            'last_name' => 'Magar',
            'phone_num' => '9800000000',
            'role' => 'Principal',
            'status' => 'Active',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
