<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin') -> insert([
            [
                'aFullname'=>'Nguyen Minh Anh',
                'aEmail'=>'anhbg330011@gmail.com',
                'aPassword'=>Hash::make('123'),
                'aPhoneNumber'=>'0862351477',
                'aGender'=>'0'
            ]
        ]);
    }
}
