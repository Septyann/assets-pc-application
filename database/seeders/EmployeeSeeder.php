<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Employee::query()
			->create([
				'name' => 'Kevin',
				'position_id' => '1',
				'ip0' => '55',
				'ip1' => '55'
			])
			->create([
				'name' => 'Agung',
				'position_id' => '2',
				'ip0' => '56',
				'ip1' => '56',
				'ip2'	=> '56'
			])
			->create([
				'name' => 'Shofi',
				'position_id' => '3',
				'ip0' => '57',
				'ip1' => '57',
			]);
	}
}
