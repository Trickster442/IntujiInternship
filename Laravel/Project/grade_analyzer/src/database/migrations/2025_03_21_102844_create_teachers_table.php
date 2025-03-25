<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Database\Seeders\TeacherSeeder;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE teachers (
                id SERIAL PRIMARY KEY,
                first_name VARCHAR(100) NOT NULL,
                last_name VARCHAR(100) NOT NULL,
                phone_num VARCHAR(20) NOT NULL,
                role VARCHAR(20) NOT NULL DEFAULT 'Teacher' CHECK (role IN ('Teacher', 'ClassTeacher', 'Principal')),
                status VARCHAR(10) NOT NULL DEFAULT 'Pending' CHECK (status IN ('Pending', 'Active')),
                email VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL, 
                subject_class_id INTEGER UNIQUE,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (subject_class_id) REFERENCES classes_subjects(id) ON DELETE SET NULL
            )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS teachers");
    }
};