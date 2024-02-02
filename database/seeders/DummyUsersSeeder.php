<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'mimin',
                'email' => 'admin@gmail.com',
                'role' => 'administrator',
                'password' => bcrypt('12345'),
                'namalengkap' => 'zaqi',
                'alamat' => 'malang'
            ],
            [
                'name' => 'mas petugas',
                'email' => 'petugas@gmail.com',
                'role' => 'petugas',
                'password' => bcrypt('12345'),
                'namalengkap' => 'fuad',
                'alamat' => 'blimbing'
            ],
            [
                'name' => 'mas peminjam',
                'email' => 'peminjam@gmail.com',
                'role' => 'peminjam',
                'password' => bcrypt('12345'),
                'namalengkap' => 'mahfud',
                'alamat' => 'balearjosari'
            ]
        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
