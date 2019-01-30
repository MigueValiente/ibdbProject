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
        factory(App\User::class, 2)->create();
        factory(App\Publisher::class, 5)->create();
        factory(App\Book::class, 20)->create();
    }
}
