<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $services=
      [
        'WIFI',
        'Posto macchina',
        'Aria condizionata',
        'Riscaldamento',
        'TV',
        'Bagno privato',
        'Piscina',
        'Portineria',
        'Sauna',
        'Vista mare'
      ];

      foreach ($services as $service) {
        $service_obj = new Service();
        $service_obj->service_name = $service;
        $service_obj->save();
      };

    }
}
