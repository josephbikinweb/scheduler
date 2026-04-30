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
        // User::factory(10)->create();

        User::factory()->create([
            'user_name'          => 'System',
            'nickname'           => 'System',
            'gender'             => 1,
            'email'              => 'system@aisensoft.com',
            'password'           => '123',
            'mustChangePassword' => 0,
            'isActive'           => 1,
            'isSuperAdmin'       => 1,
            'phone'              => '082335677444',
        ]);
    }
}
