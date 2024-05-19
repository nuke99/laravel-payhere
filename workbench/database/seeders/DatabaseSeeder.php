<?php

namespace Workbench\Database\Seeders;

use Illuminate\Database\Seeder;
use Workbench\App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dasun Tharanga',
            'email' => 'hello@dasun.dev',
            'password' => 'password',
            'phone' => '0770689524',
            'address' => '358, Maussakanda, Nikakatiya',
            'city' => 'Bulutota',
            'country' => 'Sri Lanka'
        ]);
    }
}
