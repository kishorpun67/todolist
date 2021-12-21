<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Admin;
use DB;
use Hash;

class AdminSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
