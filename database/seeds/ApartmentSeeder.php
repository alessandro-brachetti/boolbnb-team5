<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      for ($i=1; $i <= 5; $i++) {
        $apartment = new Apartment();
        $apartment->title = $faker->word();
        $apartment->n_rooms = $faker->randomDigit();
        $apartment->n_beds = $faker->randomDigit();
        $apartment->n_bathrooms = $faker->randomDigit();
        $apartment->mq = $faker->randomNumber(4);
        $apartment->address = $faker->word();
        $apartment->latitude = $faker->randomDigit();
        $apartment->longitude = $faker->randomDigit();
        $apartment->img = $faker->imageUrl(360, 360, 'animals', true);
        $apartment->visible = $faker->boolean();
        $apartment->user_id = $faker->numberBetween(1,2);
        $apartment->save();
      }
    }
}
