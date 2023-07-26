<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('currencies')->truncate();
        DB::table('currencies')->insert([

            [
                'code'=>'BY',
                'symbol' => 'Br',
                'is_main' => 1,
                'rate' => 1

            ],
            [
                'code'=>'USD',
                'symbol' => '$',
                'is_main' => 0,
                'rate' => 0.4

            ],
            [
                'code'=>'EUR',
                'symbol' => '€  ',
                'is_main' => 0,
                'rate' => 0.36

            ]
        ]);
    }
}
