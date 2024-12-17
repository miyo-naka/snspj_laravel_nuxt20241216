<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'post' => 'testtesttesttesttesttesttesttest',
            'user_id' => '1',
        ];
        DB::table('posts')->insert($param);
    }
}
