<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * Total number of users.
     *
     * @var int
     */
    protected $totalUsers = 1;

    public function run()
    {
        factory(\App\User::class)->times($this->totalUsers)->create();
    }
}
