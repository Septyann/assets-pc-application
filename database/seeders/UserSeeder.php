<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()
				->create([
					'name' => 'Kevin Septyan',
					'username' => 'admin',
					'email' => 'kevin@gmail.com',
					'is_admin' => '1',
					'is_user' => '0',
					'password' => Hash::make('123')
				])
				->create([
					'name' => 'Admin',
					'username' => 'admin',
					'email' => 'admin@gmail.com',
					'is_admin' => '1',
					'is_user' => '0',
					'password' => Hash::make('123')
				])
				->create([
					'name' => 'User',
					'username' => 'user',
					'email' => 'user@gmail.com',
					'is_admin' => '0',
					'is_user' => '1',
					'password' => Hash::make('123')
				]);
    }
}
