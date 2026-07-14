<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Placeholder credentials — log in once and change the password
        // from the admin settings page.
        User::query()->updateOrCreate(
            ['email' => 'admin@samrequena.be'],
            ['name' => 'Sam Requena', 'password' => 'Ch4nge_Th1s!'],
        );

        $this->call(SkillSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
