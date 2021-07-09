<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','almamun@gmail.com')->first();
        if(is_null($user))
        {
        	$user           = new User();
        	$user->name     = "abdullah";
        	$user->email    = "almamun@mail.com";
        	$user->password = Hash::make(123);
        	$user->save();
        }
    }
}
