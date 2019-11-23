<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Total number of users.
     *
     * @var int
     */
    protected $totalUsers = 1;

    /**
     * Seed the application database
     *
     * @param Faker $faker\
     */
    public function run(Faker $faker)
    {
        $users = factory(\App\User::class)->times($this->totalUsers)->create();

        $users->random($this->totalUsers)
            ->each(function ($user) use ($faker) {
                $user->comments()
                    ->saveMany(
                        factory(\App\Comment::class)
                            ->times($faker->numberBetween(1, $this->totalUsers))
                            ->make()
                    );
            });
    }
}
