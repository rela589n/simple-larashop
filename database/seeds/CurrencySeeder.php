<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->truncate();

        DB::table('currencies')->insert(
            [
                [
                    'code'       => 'UAH',
                    'symbol'     => '₴',
                    'is_main'    => 1,
                    'rate'       => 28,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ],
                [
                    'code'       => 'RUB',
                    'symbol'     => '₽',
                    'is_main'    => 0,
                    'rate'       => 14,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ],
                [
                    'code'       => 'USD',
                    'symbol'     => '$',
                    'is_main'    => 0,
                    'rate'       => 1,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ],
                [
                    'code'       => 'EUR',
                    'symbol'     => '€',
                    'is_main'    => 0,
                    'rate'       => 0.7,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ],
            ]
        );
    }
}
