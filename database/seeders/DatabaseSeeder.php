<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Principal',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        User::factory()->count(5)->create([
            'role' => 'technicien',
        ]);

        User::factory()->count(10)->create([
            'role' => 'employe',
        ]);

        Category::create([
            'name' => 'Climatisation',
            'description' => 'Incidents liés aux systèmes de climatisation',
        ]);

        Category::create([
        'name' => 'Electricité',
        'description' => 'Incidents électriques',
        ]);

        Category::create([
            'name' => 'Réseau',
            'description' => 'Incidents liés au réseau informatique',
        ]);

        Category::create([
            'name' => 'Plomberie',
            'description' => 'Incidents liés à la plomberie',
        ]);

        Category::create([
            'name' => 'Imprimante',
            'description' => 'Incidents liés aux imprimantes',
        ]);

        Ticket::factory()->count(50)->create();

    }

}
