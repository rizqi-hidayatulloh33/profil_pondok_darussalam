<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@darussalam.com'],
            [
                'name'              => 'Admin Darussalam',
                'email'             => 'admin@darussalam.com',
                'password'          => Hash::make('password123'),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        );

        $this->command->info('✅ Akun Admin berhasil dibuat:');
        $this->command->info('   Email   : admin@darussalam.com');
        $this->command->info('   Password: password123');
    }
}
