<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
            'name' => 'Base',
            'price' => 2.99,
            'duration' => 24
            ],
            [
            'name' => 'Standard',
            'price' => 5.99,
            'duration' => 72
            ],
            [
            'name' => 'Premium',
            'price' => 9.99,
            'duration' => 144
            ],
        ];

       foreach ($sponsors as $sponsor) {
        Sponsor::create($sponsor);
        }
    }
}
