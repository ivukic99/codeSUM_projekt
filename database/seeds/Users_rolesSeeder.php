<?php

use Illuminate\Database\Seeder;
use App\Users_roles;

class Users_rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users_roles::insert([
            [
                'user_id' => '1',
                'role_id' => '4'
            ],
            [
                'user_id' => '2',
                'role_id' => '4'
            ],
        ]);
    }
}
