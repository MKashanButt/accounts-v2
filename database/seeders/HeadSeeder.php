<?php

namespace Database\Seeders;

use App\Models\Head;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Head::create([
            'name' => 'Test Head',
            'user_id' => 1,
        ]);
    }
}
