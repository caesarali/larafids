<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RunningTextTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('running_texts')->insert([
            'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aperiam numquam provident nam dicta veritatis, ad omnis harum quasi nobis eius cumque sint delectus, expedita distinctio sit dolore aliquid libero!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
