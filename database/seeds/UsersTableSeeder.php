<?php

use Illuminate\Database\Seeder;

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
            [
                'id' => 1,
                'name' => 'Manager',
                'email' => 'manager@email.com',
                'password' => \Illuminate\Support\Facades\Hash::make('manager_password'),
                'role_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Waiter',
                'email' => 'waiter@email.com',
                'password' => \Illuminate\Support\Facades\Hash::make('waiter_password'),
                'role_id' => 2
            ]
        ]);
    }
}
