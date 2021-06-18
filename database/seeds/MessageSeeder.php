<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $message = new Message();
            $message->name = $faker->firstName();
            $message->lastname = $faker->lastName();
            $message->email = $faker->email();
            $message->message = $faker->paragraph();
            $message->save();
        }
    }
}
