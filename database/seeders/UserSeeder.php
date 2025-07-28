<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name' => 'Mario Rossi',
            'email' => 'mariorossi@mail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,],
            ['name' => 'Giovanni Bianchi',
            'email' => 'giovannibianchi@mail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,],
            ['name' => 'Luca Verdi',
            'email' => 'lucaverdi@mail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,]
        ];

        foreach ($user as $u) {
            User::create($u);
        }
    }
}
