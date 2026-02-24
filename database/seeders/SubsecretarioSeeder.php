<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SubsecretarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Subsecretario',
            'email' => 'subsecretaria@hascoah.com',
            'password' => Hash::make('Subsec6985$'),
            'role' => 'subsecretario', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
