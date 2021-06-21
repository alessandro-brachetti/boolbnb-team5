<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = "test";
      $user->lastname = "test";
      $user->birthday = "1999/01/01";
      $user->email = "test@mail.com";
      $user->password = Hash::make("test1234");
      $user->save();
    }
}
