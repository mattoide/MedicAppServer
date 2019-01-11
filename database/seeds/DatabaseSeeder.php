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
        // $this->call(UsersTableSeeder::class);

        factory(MedicAppServer\Paziente::class, 3)->create()->each(function ($user) {
            $user->recapitiPaziente()->save(factory(MedicAppServer\RecapitiPaziente::class)->make());
        });
    }
}
