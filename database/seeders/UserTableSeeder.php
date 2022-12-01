<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sakthi',
            'email' => 'sakthi@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('sakthi@123'),
            'role' => 1
        ]);
    }
}
