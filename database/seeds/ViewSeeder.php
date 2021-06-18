<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\View;
class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $view = new View();
            $view->ip_address = $faker->ipv4();
            $view->save();
        }
    }
}
