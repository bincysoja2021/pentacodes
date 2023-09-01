<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'         => "bincy",
            'email'        => 'bincy@gmail.com',
            'password'     => Hash::make('12345678')
        ]);
    }
}
