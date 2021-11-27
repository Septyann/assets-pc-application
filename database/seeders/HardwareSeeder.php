<?php

namespace Database\Seeders;

use App\Models\Hardware;
use Illuminate\Database\Seeder;

class HardwareSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$hardwares =
			[
				'Epson L 1110',
				'Epson L 310',
				'Epson LX-310',
				'Canon Lide'
			];

		foreach ($hardwares as $hardware) {
			Hardware::query()->create([
				'name' => $hardware
			]);
		}
	}
}
