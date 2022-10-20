<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'firstname' => Str('test'),
            'lastname' => Str('employee'),
            'company' => Str('test company'),
            'email' => Str('testemployee@email.com'),
            'phone' => Str('01010100101'),
        ]);
    }
}
