<?php

namespace Database\Seeders;

use App\Models\EmployeeHardware;
use Illuminate\Database\Seeder;

class EmployeeHardwareSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		EmployeeHardware::query()
			->create([
				'employee_id' => '1',
				'hardware_id' => '1',
			])
			->create([
				'employee_id' => '1',
				'hardware_id' => '2',
			])
			->create([
				'employee_id' => '1',
				'hardware_id' => '3',
			]);
	}
}
