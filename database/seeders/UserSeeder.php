<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
Use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'moderator',
            'email'=>'moderator@mail.ru',
            'password'=>Hash::make('123456'),
            'role'=>'moderator',
        ]);
    }
}
