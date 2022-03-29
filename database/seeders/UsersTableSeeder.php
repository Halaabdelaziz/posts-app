<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456789'),
            'phone'=>'01062413434'
        ]);
        $user->attachRole('admin');
    }
}
