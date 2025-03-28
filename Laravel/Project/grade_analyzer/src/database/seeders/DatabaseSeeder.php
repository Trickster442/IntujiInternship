<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(TeacherSeeder::class);

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
