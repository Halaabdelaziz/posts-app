<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Role::create([
            'name'=>'admin',
            'display_name'=>'admin',
            'description'=>'can see all posts of all users'
        ]);
        $user = Role::create([
            'name'=>'user',
            'display_name'=>'user',
            'description'=>'can create , edit , shiw and delete his own posts'
        ]);
    }
}
