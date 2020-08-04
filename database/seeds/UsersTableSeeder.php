<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$NuPQlC8HL6F4z5VVKi2ZQ./qj.NSMFVtkLbio4rO/savX6P3GkIVG',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
