<?php

use App\User;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ticket::class, 100)->make()->each(function ($ticket) {
            $users = User::all();
            $user = $users->random();
            $user->Tickets()->save($ticket);

        });

    }
}
