<?php

use App\User;
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
        factory(User::class)->create([
            'email' => 'kolya@mail.com',
            'name' => 'Коля',
            'password' => bcrypt('kolya@mail.com')
        ]);
        factory(User::class)->create([
            'email' => 'anna@mail.com',
            'name' => 'Аня',
            'password' => bcrypt('anna@mail.com')

        ]);
        factory(User::class)->create([
            'email' => 'vall@mail.com',
            'name' => 'Валєра',
            'password' => bcrypt('vall@mail.com')

        ]);
    }
}
