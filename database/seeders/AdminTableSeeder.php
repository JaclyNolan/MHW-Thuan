<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'aFullname' => 'Nguyen Minh Anh',
                'aEmail' => 'anhbg330011@gmail.com',
                'aPassword' => Hash::make('123'),
                'aPhoneNumber' => '0862351477',
                'aGender' => false
            ],
            [
                'aFullname' => 'Cao Vi Hoa',
                'aEmail' => 'lmaoidk@gmail.com',
                'aPassword' => Hash::make('123'),
                'aPhoneNumber' => '0987654356',
                'aGender' => true
            ]
        ]);
        for ($i = 0; $i < 10; $i++) {
            DB::table('admin')->insert([
                [
                    'aFullname' => Str::random(10),
                    'aEmail' => Str::random(10) . '@gmail.com',
                    'aPassword' => Hash::make('password'),
                    'aPhoneNumber' => rand(100000000, 999999999),
                    'aGender' => rand(0, 1)
                ]
            ]);
        }
    }
}
