<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$accessories =
			[
				'USB Wifi',
				'Speaker Robot',
				'UPS'
			];

		foreach ($accessories as $accessory) {
			Accessory::query()->create([
				'name' => $accessory
			]);
		}
	}
}
