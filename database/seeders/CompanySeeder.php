<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => Str('test company'),
            'email' => Str('testcompany@email.com'),
            'logo' => Str('/storage/logos/test company/test companylogo.png'),
            'website' => Str('testcompanywebsite.com'),
        ]);
    }
}
