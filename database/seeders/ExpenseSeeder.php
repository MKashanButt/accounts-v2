<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expense::create([
            'date' => Date::now(),
            'description' => 'Description for expense 1',
            'file' => 'file1.txt',
            'type' => 'debit',
            'amount' => 100.00,
            'head_id' => 1,
        ]);
    }
}
