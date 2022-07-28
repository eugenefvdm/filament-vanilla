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
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'     => 'Eugene van der Merwe',
            'email'    => 'eugene@vander.host',
            'password' => '$2y$10$YpkR6XSN6SjcuiJ3TTPOqu3R6AnhzR3cIIdJk/8FLNAx7QdWEeLlu',
        ]);

        \App\Models\User::factory()->count(24)->create();
    }
}
