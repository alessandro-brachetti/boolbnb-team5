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
      for ($i=1; $i <= 2; $i++) { 
        $user = new User();
        $user->name = "test".$i;
        $user->lastname = "test".$i;
        $user->birthday = "1999/01/01";
        $user->email = "test".$i."@mail.com";
        $user->password = Hash::make("test1234");
        $user->save();
      }    
    }
}
