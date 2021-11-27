<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$positions =
			[
				'Design',
				'Acounting',
				'Production'
			];

		foreach ($positions as $position) {
			Position::query()->create([
				'name' => $position
			]);
		}
	}
}
