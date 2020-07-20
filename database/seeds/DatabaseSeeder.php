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
        // $this->call(UserSeeder::class);
        // factory(App\User::class,50)->create();
        // factory(App\Post::class,200)->create();
        factory(App\Comment::class,300)->create();
    }
}
