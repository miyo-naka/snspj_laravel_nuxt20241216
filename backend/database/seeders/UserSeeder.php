<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'test1',
            'email' => 'test@email.com',
            'password' => Hash::make('test_pass'),
            'email_verified_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
