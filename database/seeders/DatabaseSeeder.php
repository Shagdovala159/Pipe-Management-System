<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Hash;
use Carbon\Carbon;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@admin.com',
            'join_date' => $todayDate,
            'role_name' => 'Super Admin',
            'password'  => Hash::make('password'),
        ]);
    }
}
