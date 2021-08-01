<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@ivent.com',
                'is_admin' => '1',
                'foto' => 'none',
                'no_tlp' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@ivent.com',
                'foto' => 'none',
                'no_tlp' => '1',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

// Command untuk send seeder admin
// $ php artisan db:seed --class=CreateUsersSeeder
