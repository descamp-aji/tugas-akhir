<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Descamp Warna Purna Aji',
            'email' => 'test@example.com',
            'nip' => '958631669',
            'phone' => '+6288211924839',
            'seksi_id' => 4,
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);
    }
}
