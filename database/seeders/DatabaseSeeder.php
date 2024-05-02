<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'nama'=>'Yunita',
        //     'nik_k'=>'123456',
        //     'email'=>'yunita@gmail.com',
        //     'password'=>Hash::make('190695'),
        //     'akses'=>'admin'
        // ]);
        User::create([
            'nama' => 'Jaenur Ridwan',
            'nik_k' => '123',
            'email' => 'jaenur@gmail.com',
            'password' => Hash::make('12345678'),
            'akses' => 'aset'
        ]);
    }
}
