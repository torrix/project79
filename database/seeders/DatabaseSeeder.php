<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Matt Fletcher',
            'email' => 'morecambe@gmail.com',
            'password' => bcrypt('test'),
        ]);

        $this->call(ComponentSeeder::class);
    }
}
