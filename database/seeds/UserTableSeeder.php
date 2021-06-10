<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->first()->id;

        $newAdmin = new User;
        $newAdmin->name = "Derrick";
        $newAdmin->email="dkip64@gmail.com";
        $newAdmin->password=bcrypt('derk');
        $newAdmin->regno="C004-0415/2014";
        $newAdmin->role()->associate($role);
        $newAdmin->save();
    }
}
