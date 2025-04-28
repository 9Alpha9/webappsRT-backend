<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nik" => "123",
            "name" => "Priyanto",
            'full_name' => 'Binti Priyanto Sumaidah',
            'handphone' => '098',
            'address' => 'Sepanjang',
            'password' => 'test123'
        ]);
    }
}
