<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Roles::create([
            'id' => 1,
            'name' => 'Member'
        ]);
        Roles::create([
            'id' => 2,
            'name' => 'Admin'
        ]);
        Roles::create([
'id'=>3,
'name' => 'Premium'
        ]);

User::create([
    'name' =>'Mimin',
    'email' =>'fathinfayyadh4@gmail.com',
    'password' =>Hash::make('mantapjiwa'),
    'phone_number' =>'089636802003',
    'avatar' =>'',
    'created_at' =>now(),
    'updated_at' =>now()
]);

    // \App\Models\User::factory(10)->create();
    // $this->call([
    //    /*  UserSeeder::class, */
    //    PackageSeeder::class
    // ]);
    }
}
