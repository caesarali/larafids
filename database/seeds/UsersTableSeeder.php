<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@larafids',
            'username' => 'admin',
            'password' => '$2y$10$iwLO2XesgEazE0mzLaLypuklg5AjqQSZ1x/Bo.jQ3XuX0O4okh9P6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
