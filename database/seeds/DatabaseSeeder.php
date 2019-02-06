<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 500; $i++) {
            try {
                factory('App\Faker\UserProfilePic', 1)->create();
            } catch (\Illuminate\Database\QueryException $e) {
                $i--;
            }
        }

        /*
        for ($i = 1; $i < 551; $i++) {            
            try {
                factory('App\Faker\UserProfilePic', 1)->create();
            } catch (\Illuminate\Database\QueryException $e) {
                $i--;
            }
        }
        */
        //factory('App\Faker\PartnerPreference', 1001)->create();
        //factory('App\Faker\PartnerPreference')->create();
       
        //factory('App\User', 1000)->create();

        //factory('App\Faker\Usersprofession', 500)->create();
        //factory('App\Faker\UsersMother', 500)->create();
        //factory('App\Faker\UsersFather', 500)->create();

        /*
        exit
        for ($i = 1; $i < 501; $i++) {
            try {
                factory('App\Faker\UserProfilePic', 1)->create();
            } catch (\Illuminate\Database\QueryException $e) {
                $i--;
            }
        }
         */

        

    }
}
