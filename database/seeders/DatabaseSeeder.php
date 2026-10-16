<?php

namespace Database\Seeders;

use App\Enums\UserRole;
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
        // 1. Super Admin Account
        User::firstOrCreate(
            ['email' => 'superadmin@pandeoka.com'],
            [
                'name' => 'Super Administrator Pande Oka',
                'password' => 'password123',
                'role' => UserRole::SuperAdmin,
                'phone' => '081234567899',
                'province' => 'Bali',
                'city' => 'Denpasar',
                'postal_code' => '80361',
                'address' => 'Kantor Pusat Pande Oka Furniture, Denpasar, Bali',
            ]
        );

        // 2. Regular User Account
        User::firstOrCreate(
            ['email' => 'pelanggan@pandeoka.com'],
            [
                'name' => 'Pelanggan Pande Oka',
                'password' => 'password123',
                'role' => UserRole::User,
                'phone' => '081234567890',
                'province' => 'Bali',
                'city' => 'Denpasar',
                'postal_code' => '80361',
                'address' => 'Jl. Bypass Ngurah Rai No. 123, Sanur, Denpasar, Bali',
            ]
        );

        // 3. Authentic Solid Wood Products Catalog
        $this->call(ProductSeeder::class);
    }
}
