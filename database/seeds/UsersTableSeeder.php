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
            'password' => '$2y$10$/NofHmJlJ/4Vz/CbRgYFxOwRoYWgd1AfX.XZlREgaFeg8TZzkBnHK',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
