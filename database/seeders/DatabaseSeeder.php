<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ProductTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->name = "John";
        $user->email = "admin@admin.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->remember_token = Str::random(10);
        $user->is_admin = 1;
        $user->save();

        // User::factory(10)->create();

        $this->call([
            ProductTableSeeder::class,
        ]);
    }
}
